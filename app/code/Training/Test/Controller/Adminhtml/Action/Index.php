<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Test\Controller\Adminhtml\Action;
class Index extends \Magento\Backend\App\Action
{
    /**
     * Product list page
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $this->getResponse()->appendBody("Hello world in admin");
    }
    protected function _isAllowed() {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int)$secret==1;
    }
    /**
    INSERT INTO url_rewrite SET entity_type='custom', entity_id=0, request_path='testpage.html',
    target_path='test/action/index', redirect_type=0, store_id=1, is_autogenerated=0;
     */
}
