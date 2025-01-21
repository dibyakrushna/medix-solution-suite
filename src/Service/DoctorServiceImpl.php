<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Service\DoctorServiceInterface;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use MedixSolutionSuite\DTO\Doctor\DoctorResponseDTO;
use WP_Error;

/**
 * Description of DoctorServiceImpl
 *
 * @author dibya
 */
class DoctorServiceImpl implements DoctorServiceInterface {

    //put your code here
    public function get_all_doctors() {
        
    }

    public function get_by_id() {
        
    }

    public function save( DoctorRequestDTO $doctorRequestDto ): WP_Error|DoctorResponseDTO {
        print_r( $doctorRequestDto );
        // wp_insert_user($userdata);
    }
}
