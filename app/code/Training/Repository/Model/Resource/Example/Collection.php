<?php

namespace Training\Repository\Model\Resource\Example;

class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Training\Repository\Model\Example',
            'Training\Repository\Model\Resource\Example'
        );
    }
}
