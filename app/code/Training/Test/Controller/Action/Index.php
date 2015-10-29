<?php
/**
 * Product controller.
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Training\Test\Controller\Action;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute() {
        $this->_redirect("catalog/category/view/id/1");
        $this->getResponse()->appendBody("HELLO WORLD");
    }
}
