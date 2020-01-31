<?php

namespace Son\Office\Setup\Patch\Data;

use Son\Office\Setup\Patch\EmployeeSetupFactory;
use Son\Office\Model\DepartmentFactory;
use Son\Office\Model\EmployeeFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Patch is mechanism, that allows to do atomic upgrade data changes
 */
class InstallDefaultEmployees implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @var EmployeeSetupFactory
     */
    private $employeeSetupFactory;

    /**
     * @var DepartmentFactory
     */
    private $departmentFactory;

    /**
     * @var EmployeeFactory
     */
    private $employeeFactory;

    /**
     * InstallDefaultEmployees constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EmployeeSetupFactory $employeeSetupFactory
     * @param DepartmentFactory $departmentFactory
     * @param EmployeeFactory $employeeFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EmployeeSetupFactory $employeeSetupFactory,
        DepartmentFactory $departmentFactory,
        EmployeeFactory $employeeFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->employeeSetupFactory = $employeeSetupFactory;
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        /** @var \Son\Office\Setup\Patch\EmployeeSetup $employeeSetup */
        $employeeSetup = $this->employeeSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $employeeSetup->installEntities();

        $itDepartment = $this->departmentFactory->create();
        $itDepartment->setName('IT');
        $itDepartment->save();

        $employee = $this->employeeFactory->create();
        $employee->setDepartmentId($itDepartment->getId())
                 ->setEmail('son@dtn.com.vn')
                 ->setFirstname('Son')
                 ->setLastname('Phung')
                 ->setServiceYears(3)
                 ->setDob('1988-02-07')
                 ->setSalary(1100.00)
                 ->setVatNumber('GB123456789')
                 ->setNote('Yêu màu tím, thích màu hường');
        $employee->save();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [
//            InstallDefaultAttributes::class
        ];
    }
}
