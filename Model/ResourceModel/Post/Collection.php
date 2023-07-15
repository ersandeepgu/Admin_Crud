<?php

namespace Sandeep\AdminForm\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{    
    protected function _construct()
    {
        $this->_init('Sandeep\AdminForm\Model\Post', 'Sandeep\AdminForm\Model\ResourceModel\Post');       
    }    
}
