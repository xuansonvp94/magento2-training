<?php

namespace Son\Office\Controller\Adminhtml\Department;

use Son\Office\Controller\Adminhtml\Department;

/**
 * Class Save
 * @package Son\Office\Controller\Adminhtml\Department
 */
class Save extends Department
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $modelId = (int)$this->getRequest()->getParam('entity_id');
        $data = $this->getRequest()->getPostValue();

        if(!$data) {
            return $resultRedirect->setPath('*/*/');
        }

        if($modelId) {
            $model = $this->_objectManager->create('Son\Office\Model\Department')
                ->load($modelId);
        } else {
            $model = $this->_objectManager->create('Son\Office\Model\Department');
        }

        $model->setData($data);
        try {
            $model -> save();
            $this->messageManager->addSuccessMessage('Department was successfully saved');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return  $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('entity_id')]);
        }

        if ($this->getRequest()->getParam('back') == 'edit') {
            return  $resultRedirect->setPath('*/*/edit', ['id' =>$model->getId()]);
        }
        return $resultRedirect->setPath('*/*/');

    }
}