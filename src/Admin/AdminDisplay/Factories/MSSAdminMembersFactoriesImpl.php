<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay\Factories;

use MedixSolutionSuite\Admin\AdminDisplay\Factories\MSSAdminMembersFactory;
use MedixSolutionSuite\Admin\Members\MembersController;
use MedixSolutionSuite\Admin\Members\Doctor\AdminDoctorController;
use MedixSolutionSuite\Admin\Members\Doctor\AdminDoctorTable;
use MedixSolutionSuite\Admin\Members\Patient\AdmminPatientController;
use MedixSolutionSuite\Admin\Members\Home\AdminMemberHomeController;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\Enums\MemberEnum;
use MedixSolutionSuite\Service\DoctorServiceImpl;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use WP_Error;

//enum MemberEnum: string {
//
//    case DOCTOR = "doctor";
//    case PATIENT = "patient";
//    case HOME = "home";
//}

/**
 * Description of MSSAdminMembersFactoriesImpl
 *
 * @author dibya
 */
class MSSAdminMembersFactoriesImpl implements MSSAdminMembersFactory {

    //put your code here
    public function get_member_controller(): MembersController {
        $to_match_strig = $this->get_controller_from_input();
        $query_string = sanitize_text_field(filter_input(INPUT_SERVER, "QUERY_STRING"));
        parse_str($query_string, $result);
        $keys = array_keys($result);
        if (!in_array('controller', $keys)) {
            $home_url = add_query_arg(
                    array(
                        'page' => 'mss_members',
                        'controller' => 'home',
                        'action' => 'view'
                    ),
                    admin_url('admin.php')
            );
            echo "<script>location.href = '$home_url';</script>";
            exit;
        }
        $return_value = match ($to_match_strig) {
            MemberEnum::DOCTOR->value => new AdminDoctorController(
                    admin_doctor_table: new AdminDoctorTable,
                    request: new Request,
                    doctor_service: new DoctorServiceImpl,
                    doctorDTO: new DoctorRequestDTO,
                    wp_error: new WP_Error
            ),
            MemberEnum::PATIENT->value => new AdmminPatientController(),
            MemberEnum::HOME->value => new AdminMemberHomeController(),
            default => throw new \ErrorException("Custom message"),
        };

        return $return_value;
    }

    private function get_controller_from_input(): ?string {
        $controller = sanitize_text_field(filter_input(INPUT_GET, "controller", FILTER_DEFAULT));
        return $controller ?: null;
    }
}
