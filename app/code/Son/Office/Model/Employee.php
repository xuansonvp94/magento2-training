<?php

namespace Son\Office\Model;

class Employee extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'son_office_employee';

    protected function _construct()
    {
        $this->_init(\Son\Office\Model\ResourceModel\Employee::class);
    }
}