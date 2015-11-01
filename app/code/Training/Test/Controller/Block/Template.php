<?php
namespace Training\Test\Controller\Block;

class Template extends \Magento\Framework\App\Action\Action
{
    public function execute() {
        $block = $this->_view->getLayout()->createBlock('Training\Test\Block\Template');
        $block->setTemplate('Training_Test::test.phtml');
        $this->getResponse()->appendBody($block->toHtml());
    }
}
