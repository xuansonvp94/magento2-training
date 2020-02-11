<?php

namespace Son\Office\Block\Frontend;


use Magento\FirstModule\Model\Model;
use Magento\Framework\View\Element\Template;

class Employee extends \Magento\Framework\View\Element\Template
{
    public $employee;
    public function __construct(Template\Context $context, array $data = [],\Son\Office\Model\ResourceModel\Employee\CollectionFactory $employee)
    {
        $this->employee = $employee;
        parent::__construct($context, $data);
    }

    public function getEmployee(){
        $collection = $this->employee->create();
        $collection->addAttributeToSelect('*');
        $collection->load();
        return $collection;
    }

}