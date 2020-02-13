<?php

namespace Son\Office\Controller\Adminhtml\Employee;

use Magento\Framework\Controller\ResultFactory;
use Son\Office\Controller\Adminhtml\Employee;

/**
 * Class NewAction
 * @package Son\Office\Controller\Adminhtml\Employee
 */
class NewAction extends Employee
{
    /**
     * Chay den Edit
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_FORWARD)->forward('edit');
    }
}
