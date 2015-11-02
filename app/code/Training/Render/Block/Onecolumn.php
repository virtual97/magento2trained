<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Render\Block;

/**
 * Customer register link
 *
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 */
class Onecolumn extends \Magento\Framework\View\Element\Html\Link
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->getUrl('training_render/layout/onecolumn');
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return __('Training Onecolumn');
    }

    /**
     * {@inheritdoc}
     */
    protected function _toHtml()
    {
        return parent::_toHtml();
    }
}
