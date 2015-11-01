<?php
namespace Training\Test\Controller\Product;

use Magento\Framework\App\Action\Context;

class View2 extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Catalog\Helper\Product\View
     */
    protected $layout;

    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\View\Layout $layout
    ) {
        $this->layout = $layout;
        parent::__construct($context);
    }

    public function execute()
    {
        //\Magento\Framework\View\Layout::generateXml();
        $xml = $this->layout->getUpdate()->asSimplexml();
        print_r($xml);exit;
    }
}
