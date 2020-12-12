<?php
declare(strict_types=1);

use \Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\App\RequestInterface;
use \Magento\Framework\App\Request\InvalidRequestException;

namespace Misa\Form\Controller\Form;

class Save extends \Magento\Framework\App\Action\Action implements \Magento\Framework\App\CsrfAwareActionInterface
{
    protected $_helper;
    protected $formModel;
    protected $messageManager;
    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Misa\Form\Model\FormFactory $formModel,
        \Magento\Framework\Message\ManagerInterface $messageManager

        ) {
            parent::__construct($context); 
            $this->formModel = $formModel;
            $this->messageManager = $messageManager;
    } 
    public function createCsrfValidationException( \Magento\Framework\App\RequestInterface $request ): ? \Magento\Framework\App\Request\InvalidRequestException { 
        return null; 
    } 

    public function validateForCsrf(\Magento\Framework\App\RequestInterface $request): ?bool {     
        return true; 
    }

    public function execute() {    
        
        $post = $this->getRequest()->getPost();

        $form = $this->formModel->create();

        try {
            $this->validatePostData();

            $form->addData([
                "phone" => $post->phone,
                "address" => $post->address,
                "email" => $post->email,
                "name" => $post->name,
                "country_id" => (int)$post->country_id
            ]);

            $form->save();

            $this->messageManager->addSuccessMessage(
                'Form data saved successfully'
            );

        } catch(\Exception $e) {
            $this->messageManager->addErrorMessage(
                $e->getMessage()
            );
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        
        return $resultRedirect->setPath('/');
    }

    /***
     * !Add Zend Validation for post data
     */
    public function validatePostData()
    {
        foreach ($this->getRequiredFields() as $field) {
            if (is_null($this->getRequest()->getPost()->{$field})) {
                throw new \Exception(
                    "Field '$field' required. Please fill it to Mi Form"
                );
            }
        }
    }

    public function getRequiredFields()
    {
        return [
            "name", 
            "email", 
            "address", 
            "phone", 
            "country_id"
        ];
    }
}