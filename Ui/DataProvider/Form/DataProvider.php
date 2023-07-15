<?php

namespace Sandeep\AdminForm\Ui\DataProvider\Form;

use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class ProductDataProvider
 */
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

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $items = $this->getCollection()->getData();
        return [
            'totalRecords' => $this->getCollection()->getSize(),
            'items' => array_values($items),
        ];
    }
}
