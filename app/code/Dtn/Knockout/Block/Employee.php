<?php

namespace Dtn\Knockout\Block;

use Magento\Framework\Serialize\Serializer\Serialize;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Element\Template;
use Dtn\Knockout\Model\EmployeeFactory;

class Employee extends Template
{
    /**
     * @var EmployeeFactory $employeeFactory
     */
    protected $employeeFactory;

    /**
     * @var SerializerInterface $serializer
     */
    protected $serializer;

    /**
     * Employee constructor.
     * @param Template\Context $context
     * @param EmployeeFactory $employeeFactory
     * @param SerializerInterface $serialize
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        EmployeeFactory $employeeFactory,
        SerializerInterface $serialize,
        array $data = []
    )
    {
        $this->employeeFactory = $employeeFactory;
        $this->serializer = $serialize;
        parent::__construct($context, $data);
    }

    /**
     * @param $data
     * @return bool|string
     */
    public function encodeData($data) {
        return $this->serializer->serialize($data);
    }

    /**
     * @return array
     */
    public function getEmployeeJson() {
        $employeeData = [];
        $employees = $this->employeeFactory->create()->getCollection();
        foreach ($employees as $employee) {
            $employeeData[] = $employee->getData();
        }
        return $this->encodeData($employeeData);
    }
}
