<?php
namespace Training\Test\Model;
class Observer {
    protected $_logger = null;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function logPageOutput(\Magento\Framework\Event\Observer $observer)
    {
        return;
        $response = $observer->getEvent()->getData('response');
        $body = $response->getBody();
        $this->_logger->addDebug("--------\n\n\n BODY \n\n\n ". $body);
    }

    public function changeRequestParams(\Magento\Framework\Event\Observer $observer)
    {
        return;
        $request = $observer->getEvent()->getData('request');
        $request->setModuleName('catalog');//
        $request->setControllerName('product');//
        $request->setActionName('view');//
        $request->setParams(array('id' => 2));
    }
}
