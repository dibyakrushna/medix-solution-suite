<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor;

use MedixSolutionSuite\Admin\Members\Doctor\AdminDoctorTable;
use MedixSolutionSuite\Admin\Members\MembersController;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\Service\DoctorServiceImpl;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\BuildFormComponentTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\DoctorRequestValidationTrait;
use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use MedixSolutionSuite\DTO\Doctor\DoctorValidationResponseDTO;
use MedixSolutionSuite\Mapper\Doctor\DoctorRequestMapper;
use WP_Error;

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
            private DoctorDTO $doctorDTO,
            private WP_Error $wp_error,
            private DoctorRequestMapper $doctor_request_mapper,
    ) {

        //  echo "Hello I am from Doctor";
    }

    public function view(): string {

        return $this->get_template_part( "admin-doctor-table", [ "mss_admin_doctor_table_object" => $this->admin_doctor_table ] );
    }

    public function add( WP_Error|DoctorDTO $value = null ): string {
        return $this->build_component( $value );
        //return $this->get_template_part( "admin-doctor-add-new-form", [ "form_data" => $args ] );
    }

    public function save(): ?string {
        $this->validate( $this->request, $this->wp_error );
        
        if ( is_wp_error( $this->wp_error )  && $this->wp_error->has_errors()) {
            return $this->add( $this->wp_error );
        }
        $request_dto_mapped = $this->doctor_request_mapper->map();
        // $request_dto = $this->doctor_service->save( $validate );
        return $this->add( $request_dto_mapped );
    }

    private function get_template_part( string $fileName, array $args = [] ): string {
        ob_start();
        if ( !file_exists( plugin_dir_path( __FILE__ ) . "/Templates/{$fileName}.php" ) )
            throw new Exception( __( plugin_dir_path( __FILE__ ) . "/Templates/{$fileName}.php : Not found" ) );
        load_template( plugin_dir_path( __FILE__ ) . "/Templates/{$fileName}.php", true, $args );
        return ob_get_clean();
    }
}
