<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface FormRepositoryInterface
{

    /**
     * Save Form
     * @param \Misa\Form\Api\Data\FormInterface $form
     * @return \Misa\Form\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Misa\Form\Api\Data\FormInterface $form);

    /**
     * Retrieve Form
     * @param string $formId
     * @return \Misa\Form\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($formId);

    /**
     * Retrieve Form matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Misa\Form\Api\Data\FormSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Form
     * @param \Misa\Form\Api\Data\FormInterface $form
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Misa\Form\Api\Data\FormInterface $form);

    /**
     * Delete Form by ID
     * @param string $formId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($formId);
}

