<?php

declare(strict_types=1);

namespace Misa\Form\Service;

use GuzzleHttp\Client;
use GuzzleHttp\ClientFactory;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ResponseFactory;
use Magento\Framework\Webapi\Rest\Request;

/**
 * Class CountryApiService
 */
class CountryApiService
{
    /**
     * API request URL
     */
    const API_REQUEST_URI = 'https://restcountries.eu/';

    /**
     * API request endpoint
     */
    const API_REQUEST_ENDPOINT = 'rest/v2/all';

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var ClientFactory
     */
    private $clientFactory;
    private $logger;

    /**
     * GitApiService constructor
     *
     * @param ClientFactory $clientFactory
     * @param ResponseFactory $responseFactory
     */
    public function __construct(
        ClientFactory $clientFactory,
        ResponseFactory $responseFactory,
        \Magento\Framework\App\ResourceConnection $resource,
        \Misa\Form\Logger\Logger $logger
    ) {
        $this->connection = $resource->getConnection();
        $this->resource = $resource;
        $this->clientFactory = $clientFactory;
        $this->responseFactory = $responseFactory;
        $this->logger = $logger;
    }

    /**
     * Fetch some data from API
     */
    public function execute()
    {
        $repositoryName = 'magento/magento2';
        $response = $this->doRequest(static::API_REQUEST_ENDPOINT);
        $status = $response->getStatusCode(); 
        $responseBody = $response->getBody();
        $responseContent = $responseBody->getContents();

        // Get Normalized Country List 
        $list = $this->getListFromResponse(
            json_decode(
                $responseContent
            )
        );

        try {
            $tableName = $this->resource->getTableName('misa_form_country');
            $this->connection->insertOnDuplicate($tableName, $list, ["name", "code"]);

            $this->logger->debug('-> Getting data from country api', ['data' => $list]);
        } catch (\Exception $e) {
            $this->logger->error('-> Error', ['data' => $e->getMessage()]);
        }

        return $responseContent;
    }

    /**
     * Do API request with provided params
     *
     * @param string $uriEndpoint
     * @param array $params
     * @param string $requestMethod
     *
     * @return Response
     */
    private function doRequest(
        string $uriEndpoint,
        array $params = [],
        string $requestMethod = Request::HTTP_METHOD_GET
    ): Response {
        /** @var Client $client */
        $client = $this->clientFactory->create(['config' => [
            'base_uri' => self::API_REQUEST_URI
        ]]);

        try {
            $response = $client->request(
                $requestMethod,
                $uriEndpoint,
                $params
            );
        } catch (GuzzleException $exception) {
            /** @var Response $response */
            $response = $this->responseFactory->create([
                'status' => $exception->getCode(),
                'reason' => $exception->getMessage()
            ]);

            $this->logger->error('-> doRequest Error', ['data' => $e->getMessage()]);

        }

        return $response;
    }

    private function getListFromResponse($responseContent, &$list = [])
    {
        foreach($responseContent as $country) {
            $list[] = [
                "name" => $country->name,
                "code" => $country->alpha2Code,
            ];
        }
        
        return $list;
    }
}