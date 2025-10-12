<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper\Doctor;

use WP_User;
use MedixSolutionSuite\DTO\Doctor\DoctorResponseDTO;

/**
 * Description of DoctorDBToDTOMapper
 *
 * @author dibya
 */
class DoctorDBToDTOMapper {

    private array $mapper = [];
    private WP_User $doctor;

    public function __construct( private DoctorResponseDTO $doctor_response_dto
    ) {
        
    }

    /**
     * Db to DTO mapper
     * @param WP_User $doctor Wp user object
     * @param DoctorResponseDTO $dto_response Dto object
     * @return DoctorResponseDTO Return response object 
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * * */
    public function init_db_to_dto_mappinr( WP_User $doctor ): DoctorResponseDTO {
        $this->doctor = $doctor;
        $this->map_personal_info()
                ->map_professional_info()
                ->map_permissions_info()
                ->map_educational_professional_qualification()
                ->default()
                ->set_dto();
        return $this->doctor_response_dto;
    }

    /**
     * map_personal_info
     * 
     * * */
    private function map_personal_info(): self {
        $user_data = $this->doctor->get_data_by( "id", $this->doctor->ID );
        $this->mapper = array_merge( $this->mapper,
                apply_filters( "mss_admin_doctor_personal_info_db_to_dto", [
            "set_first_name" => $this->doctor->user_firstname,
            "set_last_name" => $this->doctor->last_name,
            "set_email" => $user_data->user_email,
            "set_gender" => $this->doctor->gender,
            "set_dob" => $this->doctor->dob,
            "set_phone_number" => $this->doctor->phone_number,
            "set_house_number" => $this->doctor->house_number,
            "set_street_name" => $this->doctor->street_name,
            "set_landmark" => $this->doctor->landmark,
            "set_address_line1" => $this->doctor->address_line_1,
            "set_address_line2" => $this->doctor->address_line_2,
            "set_city" => $this->doctor->city,
            "set_state" => $this->doctor->state,
            "set_postcode" => $this->doctor->zip_code,
            "set_country" => $this->doctor->country,
            "set_website" => $this->doctor->website
                ] )
        );

        return $this;
    }

    /**
     * Default
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function default(): self {

        $this->mapper = array_merge(
                $this->mapper,
                apply_filters(
                        "mss_admin_doctor_default_info_db_to_dto",
                        [
                            "set_id" => $this->doctor->ID,
                        ]
                )
        );

        return $this;
    }

    /**
     * Permissions Info 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_permissions_info(): self {
        $user_data = $this->doctor->get_data_by( "id", $this->doctor->ID );

        $this->mapper = array_merge(
                $this->mapper,
                apply_filters(
                        "mss_admin_doctor_peemission_info_db_to_dto",
                        [
                            "set_username" => $user_data->user_login,
                            "set_nickname" => $this->doctor->nickname,
                            "set_display_name" => $user_data->display_name,
                        ]
                )
        );
        return $this;
    }

    /**
     * Professional 
     * * */
    private function map_professional_info(): self {
        $this->mapper = array_merge(
                $this->mapper,
                apply_filters(
                        "mss_admin_doctor_professional_info_db_to_dto",
                        [
                            "set_specialization" => $this->doctor->specialization,
                            "set_year_of_experience" => $this->doctor->year_of_experience,
                            "set_medical_registration_number" => $this->doctor->medical_reg_number,
                            "set_consultation_fees" => $this->doctor->consulation_fee,
                        ]
                )
        );

        return $this;
    }
/**
     * Educational and professional 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_educational_professional_qualification(): self {
        $this->mapper = array_merge(
               $this->mapper,
                apply_filters(
                        "mss_admin_doctor_educational_professional_info_db_to_dto",
                        [
                            "set_degrees" => $this->doctor->degrees,
                            "set_college_university" => $this->doctor->college_university,
                            "set_year_of_graduation" => $this->doctor->year_of_grad,
                            "set_affiliations" => $this->doctor->affiliations,
                        ]
                )
        );

        return $this;
    }

    /*
     * Set DTO 
     * ** */

    private function set_dto() {
        foreach ( $this->mapper as $setter => $set_value ) {
            if ( $set_value !== null && !is_array( $set_value ) ) {
                call_user_func( [ $this->doctor_response_dto, $setter ], $set_value );
            }
        }
    }
}
