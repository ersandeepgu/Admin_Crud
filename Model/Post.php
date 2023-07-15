<?php

namespace Sandeep\AdminForm\Model;


use Magento\Framework\Model\AbstractModel;



class Post extends AbstractModel 
{   
    protected function _construct()
    {
        $this->_init('Sandeep\AdminForm\Model\ResourceModel\Post');
    } 
}
