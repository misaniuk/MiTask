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
/** * @inheritDoc */ 
public function createCsrfValidationException( \Magento\Framework\App\RequestInterface $request ): ? \Magento\Framework\App\Request\InvalidRequestException { 
         return null; 
} 
/** * @inheritDoc */ 
public function validateForCsrf(\Magento\Framework\App\RequestInterface $request): ?bool {     
return true; 
}

public function execute() {    
    
    $post = $this->getRequest()->getPost();

    $form = $this->formModel->create();

    $form->addData([
        "phone" => $post->phone,
        "address" => $post->address,
        "email" => $post->email,
        "name" => $post->name,
        "country_id" => $post->country_id
    ]);

    $form->save();

    // if ok
    // Do Validation
    if (false) {
        $this->messageManager->addErrorMessage('Your Error Message');
    } else {
        $this->messageManager->addSuccessMessage('Form data saved successfully');
    }
    
    $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('/');


    var_dump($post->name);
    // write your code here 
    }
}