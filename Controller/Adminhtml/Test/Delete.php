<?php

namespace Sandeep\AdminForm\Controller\Adminhtml\Test;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;

class Delete extends  \Magento\Framework\App\Action\Action
{   


   
    public function execute()
    {

        // die('sa');
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
                
                // go to grid
                $this->_eventManager->dispatch('adminhtml_cmspage_on_delete', [
                    'title' => $title,
                    'status' => 'success'
                ]);
                
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->_eventManager->dispatch(
                    'adminhtml_cmspage_on_delete',
                    ['title' => $title, 'status' => 'fail']
                );
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['page_id' => $id]);
            }
        }
        
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a page to delete.'));
        
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}