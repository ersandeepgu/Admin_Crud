<?php

namespace Sandeep\AdminForm\Ui\Component\Listing\Columns\Form;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class Actions extends Column
{
    public $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                'form/test/edit',
                                [
                                    'id' => $item['id'],
                                ]
                            ),
                            'label' => __('Edit'),
                            'class' => 'cedcommerce actions edit'
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                'form/test/delete',
                                [
                                    'id' => $item['id'],
                                ]
                            ),
                            'label' => __('Delete'),
                            'class' => 'cedcommerce actions delete'
                        ],

                    ];
                }
            }
        }

        return $dataSource;
    }


}
