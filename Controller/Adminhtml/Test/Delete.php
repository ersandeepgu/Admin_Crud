<?php

namespace Sandeep\AdminForm\Controller\Adminhtml\Test;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;

class Delete extends  \Magento\Framework\App\Action\Action
{  
   
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        
        if ($id) {
            $title = "";
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Sandeep\AdminForm\Model\Post::class);
                $model->load($id);
                
                $title = $model->getName();
                $model->delete();
                
                // display success message
                $this->messageManager->addSuccessMessage(__('The page has been deleted.'));   
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {               
                // $this->messageManager->addErrorMessage($e->getMessage());
                 $this->messageManager->addErrorMessage(__('We can\'t find a page to delete.'));
               
            }
        }
        
        return $resultRedirect->setPath('*/*/');
    }
}