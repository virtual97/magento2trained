<?php

namespace Training\Repository\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ExampleRepositoryInterface
{

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
