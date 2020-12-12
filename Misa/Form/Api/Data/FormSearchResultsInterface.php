<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Api\Data;

interface FormSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Form list.
     * @return \Misa\Form\Api\Data\FormInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Misa\Form\Api\Data\FormInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

