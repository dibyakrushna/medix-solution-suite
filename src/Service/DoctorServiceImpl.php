<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Service\DoctorServiceInterface;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use MedixSolutionSuite\DTO\Doctor\DoctorResponseDTO;
use MedixSolutionSuite\Repository\Doctor\DoctorRepository;
use MedixSolutionSuite\Mapper\Doctor\DoctorDBToDTOMapper;
use MedixSolutionSuite\Mapper\Doctor\DoctorDTOToDBMapper;
use WP_Error;
use WP_User;

/**
 * Description of DoctorServiceImpl
 *
 * @author dibya
 */
class DoctorServiceImpl implements DoctorServiceInterface {

    

    public function __construct( 
            private DoctorRepository $doctor_repository,
            private DoctorDBToDTOMapper $doctor_db_to_dto_mapper, 
            private WP_User $doctor_as_user,
            private DoctorDTOToDBMapper $dto_to_db_mapper
            ) {
        
    }

    //put your code here
    public function get_all_doctors() {
        
    }

    public function get_by_id( int $id ): DoctorResponseDTO {
        $user = $this->doctor_repository->get_user_data_by_id( $id, $this->doctor_as_user );
        $response = $this->doctor_db_to_dto_mapper->init_db_to_dto_mappinr( $user );
        return $response;
    }

    public function save( DoctorRequestDTO $doctorRequestDto, WP_Error $wp_error ): WP_Error|DoctorResponseDTO {
        $user_ob = $this->dto_to_db_mapper->map( $doctorRequestDto );
        $user = $this->doctor_repository->create_or_edit_doctor( $user_ob, $wp_error );
        if ( is_wp_error( $user ) ) {
            return $user;
        }
        return $this->get_by_id( $user ); 
    }
}
