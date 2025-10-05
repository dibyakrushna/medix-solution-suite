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
            private WP_Error $wp_error,
            private DoctorRequestMapper $doctor_request_mapper,
    ) {

        //  echo "Hello I am from Doctor";
    }

    public function list(): AdminDoctorTable {
        return $this->admin_doctor_table;
    }

    public function add( WP_Error|DoctorDTO $value = null ): string {
        return $this->build_component( $value );
    }

    public function save(): ?string {
        $this->validate( $this->request, $this->wp_error );

        if ( is_wp_error( $this->wp_error ) && $this->wp_error->has_errors() ) {
            return $this->add( $this->wp_error );
        }
        $request_dto_mapped = $this->doctor_request_mapper->map();
        $request_dto = $this->doctor_service->save( $request_dto_mapped, $this->wp_error );
        return "Hello";
    }

    /**
     * Edit doctor
     * @since 1.0.0
     * @author Dibya <dibyakrishna@gmail.com>
     * @param int $id Id of Doctor
     * * */
    public function edit( int $id ):?string {
        $response = $this->doctor_service->get_by_id( $id);
        
        return $this->add( $response );
    }
}
