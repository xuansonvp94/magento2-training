<?php

namespace Son\Office\Model\ResourceModel\Employee;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Son\Office\Model\Employee::class,
            \Son\Office\Model\ResourceModel\Employee::class
        );
    }
}