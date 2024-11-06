<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Patient;

use MedixSolutionSuite\Admin\Members\MembersController;

/**
 * Description of AdmminPatientController
 *
 * @author dibya
 */
class AdmminPatientController extends MembersController {

    //put your code here
    public function add(): string {
        return "Ptient Add";
    }

    public function view(): string {
        return "Patient Table View";
    }
}
