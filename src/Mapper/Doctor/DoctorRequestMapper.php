<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper\Doctor;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;

/**
 * Description of DoctorRequestMapper
 *
 * @author dibya
 */
class DoctorRequestMapper {

    private array $text_mapping = [];
    private array $email_mapping = [];
    private array $file_mapping = [];

    public function __construct( private Request $request, private DoctorRequestDTO $doctor_request_dto ) {
        
    }

    /**
     * Personal
     * * */
    private function map_personal_info(): self {
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters( "mss_admin_doctor_personal_info",
                        [
                            "mss_admin_doctor_first_name" => "set_first_name",
                            "mss_admin_doctor_last_name" => "set_last_name",
                            "mss_admin_doctor_gender" => "set_gender",
                            "mss_admin_doctor_dob" => "set_dob",
                            "mss_admin_doctor_email" => "set_email",
                            "mss_admin_doctor_phone_num" => "set_phone_number",
                            "mss_admin_doctor_house_number" => "set_house_number",
                            "mss_admin_doctor_street_name" => "set_street_name",
                            "mss_admin_doctor_landmark" => "set_landmark",
                            "mss_admin_doctor_address_line_1" => "set_address_line1",
                            "mss_admin_doctor_address_line_2" => "set_address_line2",
                            "mss_admin_doctor_city" => "set_city",
                            "mss_admin_doctor_state" => "set_state",
                            "mss_admin_doctor_postal_code" => "set_postcode",
                            "mss_admin_doctor_country" => "set_country",
                            "mss_admin_doctor_website" => "set_website",
                        ]
                )
        );
        $this->email_mapping[] = array_merge( $this->email_mapping, [ "mss_admin_doctor_email" => "set_email" ] );
        $this->file_mapping[] = array_merge( $this->file_mapping, [ "mss_admin_doctor_profile_picture" => "set_profile_picture" ] );

        return $this;
    }

    /**
     * Professional 
     * * */
    private function map_professional_info(): self {
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters(
                        "mss_admin_doctor_professional_info",
                        [
                            "mss_admin_doctor_specialization" => "set_specialization",
                            "mss_admin_doctor_year_of_experience" => "set_year_of_experience",
                            "mss_admin_doctor_medical_registartion_number" => "set_medical_registration_number",
                            "mss_admin_doctor_consulation_fee" => "set_consultation_fees",
                        ]
                )
        );

        $this->file_mapping[] = array_merge( $this->file_mapping, [ "mss_admin_doctor_certificate" => "set_medical_license" ] );
        return $this;
    }

    /**
     * Educational and professional 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_educational_professional_qualification(): self {
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters(
                        "mss_admin_doctor_educational_professional_info",
                        [
                            "mss_admin_doctor_degrees" => "set_degrees",
                            "mss_admin_doctor_university_attended" => "set_college_university",
                            "mss_admin_doctor_graduation_year" => "set_year_of_graduation",
                            "mss_admin_doctor_affiliations" => "set_affiliations",
                        ]
                )
        );

        $this->file_mapping[] = array_merge( $this->file_mapping, [ "mss_admin_doctor_certifications_accreditations" => "set_certifications" ] );
        return $this;
    }

    /**
     * Availability scheduling 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_availability_scheduling_info(): self {
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters(
                        "mss_admin_doctor_availability_schedule_info",
                        [
                            "mss_admin_doctor_working_days" => "set_working_days",
                            "mss_admin_doctor_consultation_type" => "set_consultation_type",
                        ]
                )
        );

        return $this;
    }

    /**
     * Employment Info 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_employment_info(): self {
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters(
                        "mss_admin_doctor_employment_info",
                        [
                            "mss_admin_doctor_employment_type" => "set_employment_type",
                            "mss_admin_doctor_department" => "set_department",
                            "mss_admin_doctor_date_of_joining" => "set_date_of_joining",
                            "mss_admin_doctor_designation" => "set_designation",
                            "mss_admin_doctor_supervisor" => "set_supervisor"
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
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters(
                        "mss_admin_doctor_emergency_contact_info",
                        [
                            "mss_admin_doctor_username" => "set_emergency_contact_name",
                            "mss_admin_doctor_nickname" => "set_emergency_contact_relationship",
                            "mss_admin_doctor_display_name" => "set_emergency_contact_phone",
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
    private function map_additional_info(): self {
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters(
                        "mss_admin_doctor_emergency_contact_info",
                        [
                            "mss_admin_doctor_username" => "set_emergency_contact_name",
                            "mss_admin_doctor_nickname" => "set_emergency_contact_relationship",
                            "mss_admin_doctor_display_name" => "set_emergency_contact_phone",
                        ]
                )
        );

        return $this;
    }
     /**
     * Employment Info 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_emergency_contact_info(): self {
        $this->text_mapping[] = array_merge(
                $this->text_mapping,
                apply_filters(
                        "mss_admin_doctor_emergency_contact_info",
                        [
                            "mss_admin_doctor_emergency_contact_name" => "set_emergency_contact_name",
                            "mss_admin_doctor_emergency_contact_relationship" => "set_emergency_contact_relationship",
                            "mss_admin_doctor_emergency_phone_number" => "set_emergency_contact_phone",
                        ]
                )
        );

        return $this;
    }
    /**
     * Map
     * @author dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    public function map(): ?DoctorRequestDTO {
        return $this->map_personal_info()
                        ->map_professional_info()
                        ->map_educational_professional_qualification()
                        ->map_availability_scheduling_info()
                        ->map_employment_info()
                        ->map_emergency_contact_info()
                        ->mapp_with_text_field_sanitization()
                        ->mapp_with_email_field_sanitization()
                        ->mapp_with_file()
                        ->get_dto();
    }

    /**
     * get DTO 
     * * */
    private function get_dto(): ?DoctorRequestDTO {
        return $this->doctor_request_dto;
    }

    /**
     * map field sanitization 
     * * */
    private function mapp_with_text_field_sanitization(): self {
        foreach ( $this->text_mapping as $field => $setter ) {
            $value = $this->request->input( $field );
            if ( $value !== null ) {
                $sanitized_value = sanitize_text_field( $value );
                $this->doctor_request_dto->$setter( $sanitized_value );
            }
        }
        return $this;
    }

    /**
     * Map with email sanitization
     * ** */
    private function mapp_with_email_field_sanitization(): self {
        foreach ( $this->email_mapping as $field => $setter ) {
            $value = $this->request->input( $field );
            if ( $value !== null ) {
                $sanitized_value = sanitize_email( $value );
                $this->doctor_request_dto->$setter( $sanitized_value );
            }
        }
        return $this;
    }

    /**
     * Map with file
     * * */
    private function mapp_with_file(): self {
        foreach ( $this->file_mapping as $field => $setter ) {
            $value = $this->request->file( $field );
            if ( $value !== null ) {
                $this->doctor_request_dto->$setter( $value );
            }
        }
        return $this;
    }
}
