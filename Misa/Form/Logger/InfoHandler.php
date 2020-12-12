<?php
namespace Misa\Form\Logger;

use Monolog\Logger;

class InfoHandler extends \Magento\Framework\Logger\Handler\Base
{

    protected $loggerType = Logger::INFO;
    protected $fileName = '/var/log/misa_info.log';
}