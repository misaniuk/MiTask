<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Cron;

class CountryList
{

    protected $logger;
    protected $countryApiService;

    /**
     * Constructor
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(\Psr\Log\LoggerInterface $logger, \Misa\Form\Service\CountryApiService $countryApiService)
    {
        $this->logger = $logger;
        $this->countryApiService = $countryApiService;
    }

    /**
     * Execute the cron
     *
     * @return void
     */
    public function execute()
    {
        $this->countryApiService->execute();
        $this->logger->addInfo("Cronjob CountryList is executed.");
    }
}

