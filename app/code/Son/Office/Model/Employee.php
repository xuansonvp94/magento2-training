<?php

namespace Son\Office\Model;

use Son\Office\Model\DepartmentFactory;

class Employee extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'son_office_employee';
    protected $departmentFactory;

    public function __construct(
        DepartmentFactory $departmentFactory,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    )
    {
        $this->departmentFactory = $departmentFactory;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init(\Son\Office\Model\ResourceModel\Employee::class);
    }

    /**
     *
     * @return \Son\Office\Model\Department
     */
    public function getDepartment()
    {
        $department = $this->departmentFactory->create();
        $department->load($this->getDepartmentId());
        return $department;
    }
}