<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Model;

use Magento\Framework\Api\DataObjectHelper;
use Misa\Form\Api\Data\CountryInterface;
use Misa\Form\Api\Data\CountryInterfaceFactory;

class Country extends \Magento\Framework\Model\AbstractModel
{

    protected $countryDataFactory;

    protected $_eventPrefix = 'misa_form_country';
    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CountryInterfaceFactory $countryDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Misa\Form\Model\ResourceModel\Country $resource
     * @param \Misa\Form\Model\ResourceModel\Country\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CountryInterfaceFactory $countryDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Misa\Form\Model\ResourceModel\Country $resource,
        \Misa\Form\Model\ResourceModel\Country\Collection $resourceCollection,
        array $data = []
    ) {
        $this->countryDataFactory = $countryDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve country model with country data
     * @return CountryInterface
     */
    public function getDataModel()
    {
        $countryData = $this->getData();
        
        $countryDataObject = $this->countryDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $countryDataObject,
            $countryData,
            CountryInterface::class
        );
        
        return $countryDataObject;
    }
}

