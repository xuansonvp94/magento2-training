<?php

namespace Son\Office\Ui\Component\Employee;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Son\Office\Model\ResourceModel\Employee\CollectionFactory;

/**
 * Class DataProvider
 * @package Son\Office\Model\Employee
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var $collection
     */
    protected $collection;

    /**
     * @var Loadeddata
     */
    protected $loadedData;

    /**
     * DataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param CollectionFactory $collectionFactory
     * @param $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $colection = $collectionFactory->create();
        $colection->addAttributeToSelect('*');
        $this->collection = $colection;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array|Loadeddata
     */
    public function getData()
    {
        if (!empty($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach ($items as $employee)
        {
            $this->loadedData[$employee->getData('entity_id')] = $employee->getData();
        }

        return $this->loadedData;
    }
}