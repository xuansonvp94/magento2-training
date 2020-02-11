<?php

namespace Son\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;

class Test extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        echo 'Hello World';
        exit();
    }
}