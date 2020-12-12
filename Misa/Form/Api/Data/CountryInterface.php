<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Api\Data;

interface CountryInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const NAME = 'name';
    const COUNTRY_ID = 'country_id';
    const CODE = 'code';

    /**
     * Get country_id
     * @return string|null
     */
    public function getCountryId();

    /**
     * Set country_id
     * @param string $countryId
     * @return \Misa\Form\Api\Data\CountryInterface
     */
    public function setCountryId($countryId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Misa\Form\Api\Data\CountryExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Misa\Form\Api\Data\CountryExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Misa\Form\Api\Data\CountryExtensionInterface $extensionAttributes
    );

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Misa\Form\Api\Data\CountryInterface
     */
    public function setName($name);

    /**
     * Get code
     * @return string|null
     */
    public function getCode();

    /**
     * Set code
     * @param string $code
     * @return \Misa\Form\Api\Data\CountryInterface
     */
    public function setCode($code);
}

