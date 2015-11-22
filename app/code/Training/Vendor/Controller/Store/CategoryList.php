<?php

namespace Training\Vendor\Controller\Store;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Store\Model\Resource\Store\CollectionFactory;



class CategoryList extends Action
{
    /**
     * @var Category
     */
    private $_categoryInstance;

    /**
     * Category collection factory
     *
     * @var \Magento\Catalog\Model\Resource\Category\CollectionFactory
     */
    private $_categoryCollectionFactory;

    /**
     * Store collection factory
     *
     * @var \Magento\Store\Model\Resource\Store\CollectionFactory
     */
    private $_storeCollectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $storeCollectionFactory,
        \Magento\Catalog\Model\Resource\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory
    ) {
        parent::__construct($context);
        $this->_storeCollectionFactory = $storeCollectionFactory;
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_categoryInstance = $categoryFactory;
    }

    public function execute()
    {
        $storeCollection = $this->_storeCollectionFactory->create()->load();
        $rootCategoryIds = array();
        foreach ($storeCollection as $store) {
            $rootCategoryIds[] = $store->getRootCategoryId();
        }

        $collection = $this->_categoryCollectionFactory
            ->create()
            ->addNameToResult()
            ->addFieldToFilter('entity_id', ['nin' => $rootCategoryIds])
            ->addIsActiveFilter();

        $categoryIds = array();
        foreach ($collection as $item) {
            $categoryIds[] = $item->getName();
        }

        foreach ($storeCollection as $store) {
            $rootCategoryId = $store->getRootCategoryId();
            $category = $this->_categoryInstance->create()->load($rootCategoryId);
            $this->outputData($store->getName(), $category->getName());
        }
    }

    private function outputData($storeName, $categoryName) {
        $this->getResponse()->appendBody(sprintf(
            "\"%s - %s\"\n",
            $storeName,
            $categoryName
        ));
    }
}
