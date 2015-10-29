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
        $this->getResponse()->appendBody("HELLO WORLD");
    }
}
