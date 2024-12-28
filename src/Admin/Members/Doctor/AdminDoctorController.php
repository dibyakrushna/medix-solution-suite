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
use MedixSolutionSuite\Admin\Members\Doctor\Traits\DoctorRequestValidationTrait;
use MedixSolutionSuite\DTO\DoctorRequestDTO;
use WP_REST_Request;

/**
 * Description of DoctorTable
 *
 * @author dibya
 */
class AdminDoctorController extends MembersController {

    use BuildFormComponentTrait;
    use DoctorRequestValidationTrait;

    //put your code here

    public function __construct(
            private AdminDoctorTable $admin_doctor_table,
            private Request $request,
            private DoctorServiceImpl $doctor_service,
    ) {

        //  echo "Hello I am from Doctor";
    }

    public function view(): string {

        return $this->get_template_part( "admin-doctor-table", [ "mss_admin_doctor_table_object" => $this->admin_doctor_table ] );
    }

    public function add( array $args = [] ): string {
        return $this->build_component();
        //return $this->get_template_part( "admin-doctor-add-new-form", [ "form_data" => $args ] );
    }

    public function save(): ?string {
        try {

            $validate = $this->validate( $this->request, new DoctorRequestDTO );
            $this->doctor_service->save( $validate );
            return $this->add();
        } catch ( ErrorException $exc ) {
            return $this->add();
        }
    }

    private function get_template_part( string $fileName, array $args = [] ): string {
        ob_start();
        if ( !file_exists( plugin_dir_path( __FILE__ ) . "/Templates/{$fileName}.php" ) )
            throw new Exception( __( plugin_dir_path( __FILE__ ) . "/Templates/{$fileName}.php : Not found" ) );
        load_template( plugin_dir_path( __FILE__ ) . "/Templates/{$fileName}.php", true, $args );
        return ob_get_clean();
    }
}
