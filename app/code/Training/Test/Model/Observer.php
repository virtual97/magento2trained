<?php
namespace Training\Test\Model;
class Observer {
    public function changeRequestParams(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getEvent()->getData('request');
        $request->setModuleName('catalog');//
        $request->setControllerName('product');//
        $request->setActionName('view');//
        $request->setParams(array('id' => 2));
    }
}
