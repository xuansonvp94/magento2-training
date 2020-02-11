<?php

namespace Son\Office\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Employee extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'son_office_employee_entity',
            'entity_id'
        );
    }
}