<?php


namespace Employee\Details\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class TestInfo implements DataPatchInterface
{



    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
       ModuleDataSetupInterface $moduleDataSetup

     ) {

        $this->moduleDataSetup = $moduleDataSetup;

    }
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $setup = $this->moduleDataSetup;

        $data[] = ['id_column' => '1', 'Emp_No' => '111', 'Emp_Name' => 'Abhishek', 'DOB' => '11032000', 'Contact_No' => '9762523445'];
        
      

         $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('Employee_Table'),
            ['id_column', 'Emp_No', 'Emp_Name', 'DOB', 'Contact_No'],
      
            $data
        );     
        $this->moduleDataSetup->endSetup();
    }
    public function getAliases()
    {
        return [];
    }
    public static function getDependencies()
    {
        return [];
    }
}