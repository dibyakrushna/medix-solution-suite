<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor;

use MedixSolutionSuite\Admin\Members\Doctor\AdminDoctorTable;
use MedixSolutionSuite\Admin\Members\MembersController;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\Service\DoctorServiceImpl;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent\InputField;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\CompositComponent\TableComposite;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\BuildFormComponentTrait;

use MedixSolutionSuite\Admin\Members\Doctor\Traits\InputFieldTrait;

/**
 * Description of DoctorTable
 *
 * @author dibya
 */
class AdminDoctorController extends MembersController {
    use InputFieldTrait;
    use BuildFormComponentTrait;
    //put your code here

    public function __construct(
            
            private AdminDoctorTable $admin_doctor_table,
            private Request $request,
            private DoctorServiceImpl $doctor_service
    ) {

        //  echo "Hello I am from Doctor";
    }

    public function view(): string {

        return $this->get_template_part("admin-doctor-table", ["mss_admin_doctor_table_object" => $this->admin_doctor_table]);
    }

    public function add(array $args = []): string {
       return $this->build_component();
        return $this->get_template_part("admin-doctor-add-new-form", ["form_data" => $args]);
    }

    public function save(): ?string {
        $this->doctor_service->save($this->request);
        return $this->add();
    }

    private function get_template_part(string $fileName, array $args = []): string {
        ob_start();
//        $args= [
//             "type" => "text",
//            "name" => "mss_admin_doctor_first_name",
//            "id" => "mss_admin_doctor_first_name",
//            "extra_attr" => [],
//            "classes" => ["regular-text"],
//            "label" => "First name of doctor",
//            "header" => "First Name"
//        ];
//        $input = new InputField($args);
//        $table = new TableComposite();
//        $table->add($input);
        // return $table->render();

        load_template(plugin_dir_path(__FILE__) . "/Templates/{$fileName}.php", true, $args);
        return ob_get_clean();
    }
}
