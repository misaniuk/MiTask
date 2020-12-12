<?php
namespace Misa\Form\Logger;

use Monolog\Logger;

class ErrorHandler extends \Magento\Framework\Logger\Handler\Base
{

    protected $loggerType = Logger::ERROR;
    protected $fileName = '/var/log/misa_error.log';
}