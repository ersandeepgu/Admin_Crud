<?php

namespace Sandeep\AdminForm\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


/**
 * Cms page mysql resource
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Post extends AbstractDb
{   
    protected function _construct()
    {
        $this->_init('form', 'id');
    }   
}
