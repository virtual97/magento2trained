<?php
namespace Training\Test\Model;
class Product {
    public function afterGetPrice(\Magento\Catalog\Model\Product $product, $result)
    {
        return 5;
    }
}
