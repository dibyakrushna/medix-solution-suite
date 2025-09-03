<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper\Doctor;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;

/**
 * Description of DoctorRequestMapper
 *
 * @author dibya
 */
class DoctorRequestMapper {

    public function __construct( private Request $request, private DoctorRequestDTO $doctor_request_dto ) {
        
    }

    /**
     * Personal
     * * */
    private function mapPersonalInfo() {
        $first_name = $this->request->input( "mss_admin_doctor_first_name" );
        $this->doctor_request_dto->set_first_name( sanitize_text_field( $first_name ) );
    }

    /**
     * Professional 
     * * */
    private function mapProfessionalInfo() {
        $specialization = $this->request->input( "mss_admin_doctor_specialization", "" );
        $this->doctor_request_dto->set_specialization( sanitize_text_field( $specialization ) );
    }

    /**
     * get DTO 
     * * */
    public function map(): ?DoctorRequestDTO {
        $this->mapPersonalInfo();
        $this->mapProfessionalInfo();
        return $this->doctor_request_dto;
    }
}
