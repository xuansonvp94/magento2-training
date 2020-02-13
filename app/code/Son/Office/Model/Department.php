<?php

namespace Son\Office\Model;

class Department extends \Magento\Framework\Model\AbstractModel {
    public function _construct()
{
        $this->_init(\Son\Office\Model\ResourceModel\Department::class);
    }
}