<?php

namespace Training\Repository\Model\Resource;

class Example extends \Magento\Framework\Model\Resource\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'training_repository_example',
            'example_id'
        );
    }
}
