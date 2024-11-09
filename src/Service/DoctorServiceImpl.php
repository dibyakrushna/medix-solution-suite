<?php
declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Service\DoctorServiceInterface;
use MedixSolutionSuite\Util\Request;

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

    public function save(Request $request) {
        print_r($request->all());
    }
}
