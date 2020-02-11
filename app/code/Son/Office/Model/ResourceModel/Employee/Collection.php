<?php

namespace Son\Office\Model\ResourceModel\Employee;

use Magento\Eav\Model\Entity\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Son\Office\Model\ResourceModel\Employee
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Son\Office\Model\Employee::class,
            \Son\Office\Model\ResourceModel\Employee::class
        );
    }
}