<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Service\DoctorServiceInterface;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use MedixSolutionSuite\DTO\Doctor\DoctorResponseDTO;
use MedixSolutionSuite\Repository\Doctor\DoctorRepository;
use WP_Error;

/**
 * Description of DoctorServiceImpl
 *
 * @author dibya
 */
class DoctorServiceImpl implements DoctorServiceInterface {

    /**
     * @var DoctorResponseDTO 
     * @since 1.0.0
     * * */
    private DoctorResponseDTO $response_dto;

    /**
     * @var DoctorRepository 
     * @since 1.0.0
     * * */
    private DoctorRepository $repository;

    public function __construct( DoctorRepository $doctor_repository, DoctorResponseDTO $doctor_response_dto ) {
        $this->response_dto = $doctor_response_dto;
        $this->repository = $doctor_repository;
    }

    //put your code here
    public function get_all_doctors() {
        
    }

    public function get_by_id( int $id) {
       $user =  $this->repository->get_user_data_by_id($id);
       print_r($user);
    }

    public function save( DoctorRequestDTO $doctorRequestDto, WP_Error $wp_error ):WP_Error| DoctorResponseDTO {
        
        $user = $this->repository->create_or_edit_doctor( $doctorRequestDto, $wp_error);
        print_r($user);
    }
}
