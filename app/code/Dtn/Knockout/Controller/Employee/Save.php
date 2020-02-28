<?php

namespace Dtn\Knockout\Controller\Employee;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Dtn\Knockout\Model\EmployeeFactory;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Save extends Action
{
    /**
     * @var EmployeeFactory $employeeFactory
     */
    protected $employeeFactory;

    /**
     * @var Json $json
     */
    protected $json;

    /**
     * @var JsonFactory $resultJsonFactory
     */
    protected $resultJsonFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param EmployeeFactory $employeeFactory
     * @param Json $json
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        Context $context,
        EmployeeFactory $employeeFactory,
        Json $json,
        JsonFactory $resultJsonFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
        $this->json = $json;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $employeeData = $this->json->unserialize($this->getRequest()->getContent());
        $employeeId = $employeeData['entity_id'];
        if (empty($employeeId)) {
            unset($employeeId);
            $employee = $this->employeeFactory->create();

        } else {
            $employee = $this->employeeFactory->create()->load($employeeId);
        }
        $employee->setData($employeeData)->save();
        if ($employee) {
            $response[] = [
                'entity_id' => $employee->getId(),
                'department' => $employee->getDepartment(),
                'name' => $employee->getName(),
                'email' => $employee->getEmail(),
                'salary' => $employee->getSalary()
            ];
        }
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($response,true);
    }
}
