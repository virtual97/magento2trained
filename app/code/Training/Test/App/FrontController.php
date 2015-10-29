<?php
namespace Training\Test\App;

class FrontController extends \Magento\Framework\App\FrontController
{
    protected $_routerList;
    protected $_logger;

    public function __construct(\Magento\Framework\App\RouterList $routerList,
        \Psr\Log\LoggerInterface $logger)
    {
        $this->_routerList = $routerList;
        $this->_logger = $logger;
    }

    public function dispatch(\Magento\Framework\App\RequestInterface $request) {
        foreach ($this->_routerList as $router) {
            $this->_logger->addDebug(get_class($router));
        }
        return parent::dispatch($request);
    }
}
