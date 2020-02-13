<?php

namespace Son\Office\Controller\Adminhtml\Employee;

use Son\Office\Controller\Adminhtml\Employee;

/**
 * Class Index
 * @package Son\Office\Controller\Adminhtml\Employee
 */
class Index extends Employee
{
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend('Employees');
        return $resultPage;
    }
}
