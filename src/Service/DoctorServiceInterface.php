<?php
declare (strict_types=1);
namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\DoctorRequestDTO;
use WP_REST_Request;


/**
 * Description of DoctorService
 *
 * @author dibya
 */
interface DoctorServiceInterface {
    public  function save(DoctorRequestDTO $doctorRequestDto);
    public function  get_all_doctors();
    public function get_by_id();
}
