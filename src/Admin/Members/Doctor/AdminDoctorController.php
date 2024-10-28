<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor;

use MedixSolutionSuite\Admin\Members\Doctor\AdminDoctorTable;
use MedixSolutionSuite\Admin\Members\MembersController;

/**
 * Description of DoctorTable
 *
 * @author dibya
 */
class AdminDoctorController extends MembersController{

    //put your code here

    public function __construct(private AdminDoctorTable $adminDoctorTable) {
        //  echo "Hello I am from Doctor";
    }

    public function table_view(): string {
        ob_start();
        load_template($this->getTemplateFile("admin-doctor-table"), true, ["mss_admin_doctor_table_object" => $this->adminDoctorTable]);
        return ob_get_clean();
    }
    
    public function add(): void{
        echo "Hello";
    }

    private function getTemplateFile(string $fileName): string {

        return plugin_dir_path(__FILE__) . "/Templates/Table/{$fileName}.php";
    }
}
