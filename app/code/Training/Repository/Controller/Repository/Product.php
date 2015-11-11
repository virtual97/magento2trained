<?php

namespace Training\Repository\Controller\Repository;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Api\FilterBuilder;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrderBuilder;

class Product extends Action
{
/**
 * @var ProductRepositoryInterface
 */
    private $productRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    private $filterBuilder;

    /**
     * @var \Magento\Framework\Api\SortOrderBuilder
     */
    private $sortOrderBuilder;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        SortOrderBuilder $sortOrderBuilder
    ) {
        parent::__construct($context);
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    public function execute()
    {
        $this->getResponse()->setHeader('Content-Type', 'text/plain');
        $products = $this->getProductsFromRepository();
        foreach ($products as $product) {
            $this->outputProduct($product);
        }
    }
    /**
     * @return ProductInterface[]
     */
    private function getProductsFromRepository()
    {
        $this->setProductTypeFilter();
        $this->setProductNameFilter();
        $this->setProductOrder();
        $criteria = $this->searchCriteriaBuilder->create();
        $products = $this->productRepository->getList($criteria);
        return $products->getItems();
    }

    private function setProductTypeFilter()
    {
        $configProductFilter = $this->filterBuilder
            ->setField('type_id')
            ->setValue('simple') //Configurable::TYPE_CODE
            ->setConditionType('eq')
            ->create();
        $this->searchCriteriaBuilder->addFilters([$configProductFilter]);
    }

    private function setProductNameFilter()
    {
        $nameFilter = $this->filterBuilder
            ->setField('name')
            ->setValue('t%')
            ->setConditionType('like')
            ->create();
        $this->searchCriteriaBuilder->addFilters([$nameFilter]);
    }

    private function setProductOrder()
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField('entity_id')
            ->setDirection(SearchCriteriaInterface::SORT_DESC)
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);
        $this->searchCriteriaBuilder->setPageSize(2);
        $this->searchCriteriaBuilder->setCurrentPage(1);
    }

    private function outputProduct(ProductInterface $product)
    {
        $this->getResponse()->appendBody(sprintf(
                "%s - %s (%d)\n",
                $product->getName(),
                $product->getSku(),
                $product->getId())
        );
    }
}
