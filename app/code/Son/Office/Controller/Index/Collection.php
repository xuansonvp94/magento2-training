<?php

namespace Son\Office\Controller\Index;

use \Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use phpseclib\Net\SSH1;

class Collection extends Action {

    /**
     * @var pageFactory
     */
    protected $pageFactory;

    /**
     * @var employeeCollectionFactory
     */
    protected $employeeCollectionFactory;

    /**
     * Collection constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param \Son\Office\Model\ResourceModel\Employee\CollectionFactory $employeeCollectionFactory
     */
    public function __construct(Context $context,
                                PageFactory $pageFactory,
                                \Son\Office\Model\ResourceModel\Employee\CollectionFactory $employeeCollectionFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->employeeCollectionFactory = $employeeCollectionFactory;
    }

    /**
     * @return
     */
    public function execute()
    {
        $collection = $this->employeeCollectionFactory->create();
        $collection->addAttributeToSelect('*');
       /* $collection->addAttributeToFilter('note', ['like' => '%Note%']);*/
        $collection->load();

        foreach ($collection as $employee) {
            var_dump($employee->getData());
        }

        exit();
    }
}

