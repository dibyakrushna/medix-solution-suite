<?php
declare (strict_types=1);
namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use MedixSolutionSuite\DTO\Doctor\DoctorResponseDTO;
use WP_Error;


/**
 * Description of DoctorService
 *
 * @author dibya
 */
interface DoctorServiceInterface {
    public  function save(DoctorRequestDTO $doctorRequestDto, WP_Error $wp_error ):WP_Error| DoctorResponseDTO;
    public function  get_all_doctors();
    public function get_by_id( int $id);
}
