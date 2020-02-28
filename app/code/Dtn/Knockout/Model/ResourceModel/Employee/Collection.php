<?php

namespace Dtn\Knockout\Model\ResourceModel\Employee;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\Dtn\Knockout\Model\Employee::class,
            \Dtn\Knockout\Model\ResourceModel\Employee::class);
    }

}