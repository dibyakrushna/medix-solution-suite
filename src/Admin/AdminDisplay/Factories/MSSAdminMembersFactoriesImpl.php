<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay\Factories;

use MedixSolutionSuite\Admin\AdminDisplay\Factories\MSSAdminMembersFactory;
use MedixSolutionSuite\Admin\Members\MembersController;
use MedixSolutionSuite\Admin\Members\Doctor\AdminDoctorController;
use MedixSolutionSuite\Admin\Members\Doctor\AdminDoctorTable;

enum MemberEnum {

    case doctor;
    case patient;
}

/**
 * Description of MSSAdminMembersFactoriesImpl
 *
 * @author dibya
 */
class MSSAdminMembersFactoriesImpl implements MSSAdminMembersFactory {

    public ?string $member = null;

    public function __construct() {
        $this->member = sanitize_text_field(filter_input(INPUT_GET, "member", FILTER_DEFAULT));
    }

    //put your code here
    public function get_member_controller(): MembersController {

        $return_value = match ($this->member) {
            MemberEnum::doctor =>  new AdminDoctorController(new AdminDoctorTable),
            default => new AdminDoctorController(new AdminDoctorTable)
        };
        
        return $return_value ;
        
    }
}
