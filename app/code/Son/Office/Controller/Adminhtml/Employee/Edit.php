<?php

namespace Son\Office\Controller\Adminhtml\Employee;

use Son\Office\Controller\Adminhtml\Employee;

/**
 * Class Edit
 * @package Son\Office\Controller\Adminhtml\Employee
 */
class Edit extends Employee
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        $modelEmployee = $this->_objectManager->create('Son\Office\Model\Employee');

        if ($id) {
            $modelEmployee = $modelEmployee->load($id);
            if (!$modelEmployee->getId()) {
                $this->messageManager->addErrorMessage(__('This employee does not exists.'));
                return $resultRedirect->setPath('son/*/', ['_current' => true]);
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $modelEmployee->setData($data);
        }

        $resultPage = $this->pageFactory->create();
        if (!$modelEmployee->getId()) {
            $pageTitle = __('New Employee');
        } else {
            $pageTitle =  __('Edit Employee %1 ', $modelEmployee->getData('firstname') );
        }
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);

        return $resultPage;
    }
}