<?php

namespace Son\Office\Model\ResourceModel;

class Department extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct()
    {
        $this->_init('son_office_department', 'entity_id');
    }
}
