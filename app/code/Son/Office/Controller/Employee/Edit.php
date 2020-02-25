<?php

namespace Son\Office\Controller\Employee;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 * @package Son\Office\Controller\Employee
 */
class Edit extends Action
{
    /**
     * @var PageFactory $pageFactory
     */
    protected $pageFactory;

    /**
     * @var Http $request
     */
    protected $request;

    /**
     * @var Registry $coreRegistry
     */
    protected $_coreRegistry;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param Http $request
     * @param Registry $coreRegistry
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Http $request,
        Registry $coreRegistry
    )
    {
        $this->pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->request = $request;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $employeeId = $this->_request->getParam('entity_id');
        $this->_coreRegistry->register('current_employee_id', $employeeId);
        return $this->pageFactory->create();
    }
}