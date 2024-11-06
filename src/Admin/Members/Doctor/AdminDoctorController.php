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
class AdminDoctorController extends MembersController {

    //put your code here

    public function __construct(private AdminDoctorTable $adminDoctorTable) {
        //  echo "Hello I am from Doctor";
    }

   

    public function view(): string {
        ob_start();
        load_template($this->getTemplateFile("admin-doctor-table"), true, ["mss_admin_doctor_table_object" => $this->adminDoctorTable]);
        return ob_get_clean();
    }

    public function add(): string {
        ob_start();
        load_template($this->getTemplateFile("admin-doctor-add-new-form"), true );
        return ob_get_clean();
    }

    private function getTemplateFile(string $fileName): string {

        return plugin_dir_path(__FILE__) . "/Templates/{$fileName}.php";
    }
}
