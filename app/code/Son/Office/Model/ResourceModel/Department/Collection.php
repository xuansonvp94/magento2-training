<?php

namespace Son\Office\Model\ResourceModel\Department;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Son\Office\Model\Department::class,
            \Son\Office\Model\ResourceModel\Department::class
        );
    }
}