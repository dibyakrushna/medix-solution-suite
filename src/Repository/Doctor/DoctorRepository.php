<?php
declare (strict_types=1);
namespace MedixSolutionSuite\Repository\Doctor;

use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use WP_Error;
use WP_User;
use stdClass;

/**
 * Description of DoctorRepository
 *
 * @author dibya
 */
class DoctorRepository {
    /**
     * @var user data
     *  @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * **/
    private WP_User $wp_user ;
    public function __construct( WP_User $doctor_as_user) {
        $this->wp_user = $doctor_as_user;
    }

    /**
     * Creating doctor or editing
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * ** */
    public function create_or_edit_doctor( DoctorRequestDTO $doctorRequestDto, WP_Error $wp_error ): WP_Error|int {
        $user_name = $doctorRequestDto->get_username();
        $email = $doctorRequestDto->get_email();
        $id = $doctorRequestDto->get_id();
        $password = $doctorRequestDto->get_password();
        
        $is_user_exist = username_exists( $username );
        $is_email_exist = email_exists( $email );
        if ( is_int($is_user_exist) && is_int( $id ) &&  $id !== $is_user_exist) {
            $wp_error->add( "mss_doctor_exist", __( "Doctor is exist", MSS_TEXT_DOMAIN ), $is_user_exist );
        }
        if(  is_int($is_email_exist) && is_int( $id ) &&  $id !== $is_email_exist ){
            $wp_error->add( "mss_email_exist", __( "Doctor email is exist", MSS_TEXT_DOMAIN ), $is_email_exist );
        }
        if( $wp_error->has_errors() ){
            return $wp_error;
        }
        $userdata = [
            "ID" => $id,
            "user_pass" => $password,
            "user_login" => $user_name,
            "nickname" => $doctorRequestDto->get_nickname(),
            "user_url" => $doctorRequestDto->get_website(),
            "user_email" => $email,
            "display_name" => $doctorRequestDto->get_display_name(),
            "first_name" => $doctorRequestDto->get_first_name(),
            "last_name" => $doctorRequestDto->get_last_name(),
            "description" => $doctorRequestDto->get_personal_statement(),
            "role" => "mss_member_doctor",
        ];
        $user = wp_insert_user($userdata) ;
        return $user;
    }
    /**
     * Getting User
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * ** */
    public function get_user_data_by_id(int $id):?stdClass{
        $doctor_data = $this->wp_user->get_data_by("id", $id);
        return $doctor_data;
    }
}
