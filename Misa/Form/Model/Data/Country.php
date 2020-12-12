<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Model\Data;

use Misa\Form\Api\Data\CountryInterface;

class Country extends \Magento\Framework\Api\AbstractExtensibleObject implements CountryInterface
{

    /**
     * Get country_id
     * @return string|null
     */
    public function getCountryId()
    {
        return $this->_get(self::COUNTRY_ID);
    }

    /**
     * Set country_id
     * @param string $countryId
     * @return \Misa\Form\Api\Data\CountryInterface
     */
    public function setCountryId($countryId)
    {
        return $this->setData(self::COUNTRY_ID, $countryId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Misa\Form\Api\Data\CountryExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Misa\Form\Api\Data\CountryExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Misa\Form\Api\Data\CountryExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Misa\Form\Api\Data\CountryInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get code
     * @return string|null
     */
    public function getCode()
    {
        return $this->_get(self::CODE);
    }

    /**
     * Set code
     * @param string $code
     * @return \Misa\Form\Api\Data\CountryInterface
     */
    public function setCode($code)
    {
        return $this->setData(self::CODE, $code);
    }
}

