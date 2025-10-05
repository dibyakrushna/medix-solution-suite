<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Service\DoctorServiceInterface;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use MedixSolutionSuite\DTO\Doctor\DoctorResponseDTO;
use MedixSolutionSuite\Repository\Doctor\DoctorRepository;
use MedixSolutionSuite\Mapper\Doctor\DoctorDBToDTOMapper;
use WP_Error;

/**
 * Description of DoctorServiceImpl
 *
 * @author dibya
 */
class DoctorServiceImpl implements DoctorServiceInterface {

    /**
     * @var DoctorRepository 
     * @since 1.0.0
     * * */
    private DoctorRepository $repository;

    public function __construct( private DoctorRepository $doctor_repository,
            private DoctorResponseDTO $doctor_response_dto,
            private DoctorDBToDTOMapper $doctor_db_to_dto_mapper ) {
        
    }

    //put your code here
    public function get_all_doctors() {
        
    }

    public function get_by_id( int $id ): DoctorResponseDTO {
        $user = $this->doctor_repository->get_user_data_by_id( $id );
        $response = $this->doctor_db_to_dto_mapper->init_db_to_dto_mappinr( $user, $this->doctor_response_dto );
        return $response;
    }

    public function save( DoctorRequestDTO $doctorRequestDto, WP_Error $wp_error ): WP_Error|DoctorResponseDTO {

        $user = $this->doctor_repository->create_or_edit_doctor( $doctorRequestDto, $wp_error );
        if ( is_wp_error( $user ) ) {
            return $user;
        }
        return $this->get_by_id( $user );
    }
}
