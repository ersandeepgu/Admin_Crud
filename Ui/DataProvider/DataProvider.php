<?php

namespace Sandeep\AdminForm\Ui\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;


class DataProvider extends AbstractDataProvider
{
    
    protected $_loadedData;

    public $objectManager;

    public $collection;

    
    public $addFieldStrategies;

    public $addFilterStrategies;

 
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Sandeep\AdminForm\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->addFieldStrategies = $addFieldStrategies;
        $this->addFilterStrategies = $addFilterStrategies;
    }

   
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $resultdata= $this->getCollection()->getItems();
        foreach ($resultdata as $data) {
            $this->_loadedData[$data->getId()] = $data->getData();
        }
        return $this->_loadedData;
    }
}
