<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Block;

class Form extends \Magento\Framework\View\Element\Template
{

    protected $collectionFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Misa\Form\Model\ResourceModel\Country\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
    }

    public function getCountryList()
    {
        $collection = $this->collectionFactory->create();

        return $collection->getData();
    }

    public function getListSelect()
    {
        $html = "<div class='block'><select required style='width: 200px;' name='country_id'><option value=''>Country</option>";

        foreach($this->getCountryList() as $country) {
            $html.= "<option value='" . $country["country_id"] . "'>" . $country["name"]
                . " (" . $country["code"] . ") " . "</option>";
        }

        $html.= "</select></div>";

        return $html;
    }


}

