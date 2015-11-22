<?php
namespace Training\Vendor\Model;

class Observer {
    protected $_logger = null;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function onCatalogProductSaveBefore($observer)
    {
        return;
        $product = $observer->getProduct();
        $data = $product->getData();
        $originData = $product->getOrigData();
        if ($product->hasDataChanges()) {
            //Not work: Notice: Array to string conversion (multidimensional array)
//            $newValues = array_diff_assoc($data, $originData);
//            $oldValues = array_diff_assoc($originData, $data);
            $added     = array_diff_key($data, $originData);
            $unset     = array_diff_key($originData, $data);
        }

        $arr[] = $product->getId();
        foreach ($added as $key => $value) {
            $arr[] = $key;
        }
        $this->_logger->addDebug("--------\n\n\n Changed product data \n\n\n ".  implode(',', $arr));
    }
}
