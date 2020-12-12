<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Misa\Form\Api\Data;

interface FormInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const COUNTRY_ID = 'country_id';
    const FORM_ID = 'form_id';
    const NAME = 'name';
    const ADDRESS = 'address';
    const EMAIL = 'email';
    const PHONE = 'phone';

    /**
     * Get form_id
     * @return string|null
     */
    public function getFormId();

    /**
     * Set form_id
     * @param string $formId
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setFormId($formId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setName($name);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Misa\Form\Api\Data\FormExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Misa\Form\Api\Data\FormExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Misa\Form\Api\Data\FormExtensionInterface $extensionAttributes
    );

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setEmail($email);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setPhone($phone);

    /**
     * Get address
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     * @param string $address
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setAddress($address);

    /**
     * Get country_id
     * @return string|null
     */
    public function getCountryId();

    /**
     * Set country_id
     * @param string $countryId
     * @return \Misa\Form\Api\Data\FormInterface
     */
    public function setCountryId($countryId);
}

