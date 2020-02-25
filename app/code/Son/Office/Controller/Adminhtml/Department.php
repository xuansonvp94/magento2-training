<?php

namespace Son\Office\Controller\Adminhtml;

use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\LayoutFactory;
use Magento\Framework\View\Result\PageFactory;

abstract class Department extends Action
{
    /**
     * @var ForwardFactory
     */
    protected $forwardFactory;

    /**
     * @var LayoutFactory
     */
    protected $layoutFactory;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * Department constructor.
     * @param Context $context
     * @param LayoutFactory $layoutFactory
     * @param PageFactory $pageFactory
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(
        Context $context,
        LayoutFactory $layoutFactory,
        PageFactory $pageFactory,
        ForwardFactory $forwardFactory)
    {
        $this->layoutFactory = $layoutFactory;
        $this->pageFactory = $pageFactory;
        $this->forwardFactory = $forwardFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    protected function _initAction()
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Son_Office:department');
        $resultPage->addBreadcrumb(__('Office'), __('Office'));
        $resultPage->addBreadcrumb(__('Department'), __('Department'));
        return $resultPage;
    }
}
