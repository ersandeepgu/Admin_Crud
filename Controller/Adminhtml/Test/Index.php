<?php

namespace Sandeep\AdminForm\Controller\Adminhtml\Test;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;


class Index extends Action
{
    public $resultPageFactory;

    
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sandeep_AdminForm::form');
        $resultPage->getConfig()->getTitle()->prepend(__("Data"));
        return $resultPage;
    }
}
