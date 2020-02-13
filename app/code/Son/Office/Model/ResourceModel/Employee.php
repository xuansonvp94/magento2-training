<?php

namespace Son\Office\Model\ResourceModel;

class Employee extends \Magento\Eav\Model\Entity\AbstractEntity
{
    /**
     * @return \Magento\Eav\Model\Entity\Type
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getEntityType()
    {
        if (empty($this->_type)) {
            $this->setType(\Son\Office\Model\Employee::ENTITY);
        }
        return parent::getEntityType();
    }
}