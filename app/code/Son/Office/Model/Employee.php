<?php

namespace Son\Office\Model;

use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Son\Office\Model\ResourceModel\Employee::class);
    }
}