<?php

namespace Son\Office\Controller\Adminhtml\Employee;

use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\LayoutFactory;
use Magento\Framework\View\Result\PageFactory;
use Son\Office\Controller\Adminhtml\Employee;
use Son\Office\Model\EmployeeFactory;

/**
 * Class Delete
 * @package Son\Office\Controller\Adminhtml\Employee
 */
class Delete extends Employee
{
    /**
     * @var EmployeeFactory $employeeFactory
     */
    protected $employeeFactory;

    /**
     * Delete constructor.
     * @param Context $context
     * @param LayoutFactory $layoutFactory
     * @param PageFactory $pageFactory
     * @param ForwardFactory $forwardFactory
     * @param EmployeeFactory $employeeFactory
     */
    public function __construct(
        Context $context,
        LayoutFactory $layoutFactory,
        PageFactory $pageFactory,
        ForwardFactory $forwardFactory,
        EmployeeFactory $employeeFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context, $layoutFactory, $pageFactory, $forwardFactory);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $employeeId = $this->getRequest()->getParam('entity_id');
        if ($employeeId > 0) {
            $employee = $this->employeeFactory->create()->load($this->getRequest()->getParam('entity_id'));
            try {
                $employee->delete();
                $this->messageManager->addSuccessMessage('Employee was successfully deleted');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/');
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}

