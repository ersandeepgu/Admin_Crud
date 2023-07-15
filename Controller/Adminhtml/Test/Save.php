<?php

namespace Sandeep\AdminForm\Controller\Adminhtml\Test;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Sandeep\AdminForm\Model\PostFactory;
use Magento\Framework\Controller\ResultFactory;






class Save extends Action
{

    public function __construct(
        Context $context,
        PostFactory $postFactory   
     ) {
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }
    public function execute()
    {

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $postData = $this->getRequest()->getPostValue();
        if (!$postData) {
             return $resultRedirect->setPath('*/*/');
        }
        try {
            $model = $this->postFactory->create();
            $model->setData($postData);       
            $model->save();
            $this->messageManager->addSuccess( __('Save Successfully') );
        } catch (\Exception $e) {
            // Handle the exception/error
            $this->messageManager->addErrorMessage(__('Error occurred while saving the data.'));
        }
        return $resultRedirect->setPath('*/*/');

    }
}
