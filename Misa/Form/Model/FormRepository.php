<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Misa\Form\Api\Data\FormInterfaceFactory;
use Misa\Form\Api\Data\FormSearchResultsInterfaceFactory;
use Misa\Form\Api\FormRepositoryInterface;
use Misa\Form\Model\ResourceModel\Form as ResourceForm;
use Misa\Form\Model\ResourceModel\Form\CollectionFactory as FormCollectionFactory;

class FormRepository implements FormRepositoryInterface
{

    private $storeManager;

    protected $dataObjectProcessor;

    protected $extensibleDataObjectConverter;
    private $collectionProcessor;

    protected $resource;

    protected $dataFormFactory;

    protected $formCollectionFactory;

    protected $searchResultsFactory;

    protected $formFactory;

    protected $dataObjectHelper;

    protected $extensionAttributesJoinProcessor;


    /**
     * @param ResourceForm $resource
     * @param FormFactory $formFactory
     * @param FormInterfaceFactory $dataFormFactory
     * @param FormCollectionFactory $formCollectionFactory
     * @param FormSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceForm $resource,
        FormFactory $formFactory,
        FormInterfaceFactory $dataFormFactory,
        FormCollectionFactory $formCollectionFactory,
        FormSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->formFactory = $formFactory;
        $this->formCollectionFactory = $formCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataFormFactory = $dataFormFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Misa\Form\Api\Data\FormInterface $form)
    {
        /* if (empty($form->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $form->setStoreId($storeId);
        } */
        
        $formData = $this->extensibleDataObjectConverter->toNestedArray(
            $form,
            [],
            \Misa\Form\Api\Data\FormInterface::class
        );
        
        $formModel = $this->formFactory->create()->setData($formData);
        
        try {
            $this->resource->save($formModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the form: %1',
                $exception->getMessage()
            ));
        }
        return $formModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($formId)
    {
        $form = $this->formFactory->create();
        $this->resource->load($form, $formId);
        if (!$form->getId()) {
            throw new NoSuchEntityException(__('Form with id "%1" does not exist.', $formId));
        }
        return $form->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->formCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Misa\Form\Api\Data\FormInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(\Misa\Form\Api\Data\FormInterface $form)
    {
        try {
            $formModel = $this->formFactory->create();
            $this->resource->load($formModel, $form->getFormId());
            $this->resource->delete($formModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Form: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($formId)
    {
        return $this->delete($this->get($formId));
    }
}

