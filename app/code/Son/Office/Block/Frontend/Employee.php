<?php

namespace Son\Office\Block\Frontend;

use Magento\Framework\View\Element\Template;
use Son\Office\Model\ResourceModel\Employee\CollectionFactory;

class Employee extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Son\Office\Model\ResourceModel\Employee\CollectionFactory $employeeFactory
     */
    protected $employeeFactory;
    /**
     * Employee constructor.
     * @param Template\Context $context
     * @param array $data
     * @param \Son\Office\Model\ResourceModel\Employee\CollectionFactory $employeeCollection
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $employeeCollection,
        array $data = []
    )
    {
        $this->employeeFactory = $employeeCollection;
        parent::__construct($context, $data);
    }

    /**
     * @return \Son\Office\Model\ResourceModel\Employee\Collection
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getEmployee(){
        $collection = $this->employeeFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->load();
        return $collection;
    }

}