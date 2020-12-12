<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Api\Data;

interface CountrySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Country list.
     * @return \Misa\Form\Api\Data\CountryInterface[]
     */
    public function getItems();

    /**
     * Set country_id list.
     * @param \Misa\Form\Api\Data\CountryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

