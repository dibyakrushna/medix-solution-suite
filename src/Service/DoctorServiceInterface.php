<?php
declare (strict_types=1);
namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Util\Request;

/**
 * Description of DoctorService
 *
 * @author dibya
 */
interface DoctorServiceInterface {
    public  function save(Request $request);
    public function  get_all_doctors();
    public function get_by_id();
}
