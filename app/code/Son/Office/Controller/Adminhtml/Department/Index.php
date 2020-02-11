<?php

namespace Son\Office\Controller\Adminhtml\Department;

use Son\Office\Controller\Adminhtml\Department;

/**
 * Class Index
 * @package Son\Office\Controller\Adminhtml\Department
 */
class Index extends Department
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend('Departments');
        return $resultPage;
    }
}
