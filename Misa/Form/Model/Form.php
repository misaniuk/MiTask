<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Model;

use Magento\Framework\Api\DataObjectHelper;
use Misa\Form\Api\Data\FormInterface;
use Misa\Form\Api\Data\FormInterfaceFactory;

class Form extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'misa_form_form';
    protected $formDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param FormInterfaceFactory $formDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Misa\Form\Model\ResourceModel\Form $resource
     * @param \Misa\Form\Model\ResourceModel\Form\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        FormInterfaceFactory $formDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Misa\Form\Model\ResourceModel\Form $resource,
        \Misa\Form\Model\ResourceModel\Form\Collection $resourceCollection,
        array $data = []
    ) {
        $this->formDataFactory = $formDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve form model with form data
     * @return FormInterface
     */
    public function getDataModel()
    {
        $formData = $this->getData();
        
        $formDataObject = $this->formDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $formDataObject,
            $formData,
            FormInterface::class
        );
        
        return $formDataObject;
    }
}

