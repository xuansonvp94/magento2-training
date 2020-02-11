<?php

namespace  Son\Office\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Message extends Action
{
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
       $resultPage = $this->pageFactory->create();

       $this->messageManager->addSuccessMessage('Succes-1');
       $this->messageManager->addSuccessMessage('Succes-2');
       $this->messageManager->addNoticeMessage('Notice-1');
       $this->messageManager->addNoticeMessage('Notice-2');
       $this->messageManager->addWarningMessage('Warning-1');
       $this->messageManager->addWarningMessage('Warning-2');
       $this->messageManager->addErrorMessage('Error-1');
       $this->messageManager->addErrorMessage('Error-2');

       return $resultPage;
    }
}