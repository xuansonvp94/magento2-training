<?php

namespace Son\Office\Block\Frontend;


use Magento\FirstModule\Model\Model;
use Magento\Framework\View\Element\Template;

class Employee extends \Magento\Framework\View\Element\Template
{
    public $empl;
    public function __construct(Template\Context $context, array $data = [],\Son\Office\Model\ResourceModel\Employee\CollectionFactory $empl)
    {
        $this->empl = $empl;
        parent::__construct($context, $data);
    }

    public function getEmpl(){
        $collection = $this->empl->create();
        $collection->addAttributeToSelect('*');
        $collection->load();
        return $collection;
    }

}