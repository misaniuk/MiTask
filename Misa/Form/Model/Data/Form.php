<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Model\Data;

use Misa\Form\Api\Data\FormInterface;

class Form extends \Magento\Framework\Api\AbstractExtensibleObject implements FormInterface
{

    /**
     * Get form_id
     * @return string|null
     */
    public function getFormId()
    {
        return $this->_get(self::FORM_ID);
    }

    /**
     * Set form_id
     * @param string $formId
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setFormId($formId)
    {
        return $this->setData(self::FORM_ID, $formId);
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
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Misa\Form\Api\Data\FormExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Misa\Form\Api\Data\FormExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Misa\Form\Api\Data\FormExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    /**
     * Set phone
     * @param string $phone
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get address
     * @return string|null
     */
    public function getAddress()
    {
        return $this->_get(self::ADDRESS);
    }

    /**
     * Set address
     * @param string $address
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

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
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setCountryId($countryId)
    {
        return $this->setData(self::COUNTRY_ID, $countryId);
    }
}

