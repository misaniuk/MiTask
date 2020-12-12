<?php
namespace Misa\Form\Logger;

use Monolog\Logger;

class DebugHandler extends \Magento\Framework\Logger\Handler\Base
{

    protected $loggerType = Logger::DEBUG;
    protected $fileName = '/var/log/misa_debug.log';
}