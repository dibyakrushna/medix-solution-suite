<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Enums\GenderEnum;
use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

trait PersonalFieldTrait {

    /**
     * @since 1.0.0
     * * */
    private function first_name_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = array();
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_first_name" ) ) ) ) {
            $result[ "error" ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_first_name" );
        }
        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_first_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_first_name();
        }
        return $result;
    }

    /**
     * @since 1.0.0
     * * */
    private function last_name_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {

        $result = [
            "id" => "mss_admin_doctor_last_name",
            "name" => "mss_admin_doctor_last_name",
            "error" => false,
            "header" => esc_html( "Last Name", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Last name of doctor", MSS_TEXT_DOMAIN ),
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_last_name" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_last_name" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_last_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_last_name();
        }

        return $result;
    }

    /**
     * @since 1.0.0
     * * */
    private function gender_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "header" => esc_html( "Gender", MSS_TEXT_DOMAIN ),
            "type" => "radio",
            "options" => [
                [
                    "value" => esc_html( GenderEnum::FEMALE->value ),
                    "label" => __( "Female", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_female",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text" ],
                    "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_gender() ) ) && $form_values->get_gender() === GenderEnum::FEMALE->value,
                ],
                [
                    "value" => esc_html( GenderEnum::MALE->value ),
                    "label" => esc_html( "Male", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_male",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text" ],
                    "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_gender() ) ) && $form_values->get_gender() === GenderEnum::MALE->value,
                ],
                [
                    "value" => esc_html( GenderEnum::OTHER->value ),
                    "label" => esc_html( "Other", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_other",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text", "other" ],
                    "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_gender() ) ) && $form_values->get_gender() === GenderEnum::OTHER->value,
                ]
            ]
        ];
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_gender" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_gender" );
        }

        return $result;
    }

    /**
     * @since 1.0.0
     * * */
    private function dob_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "type" => "date",
            "header" => esc_html( "DOB", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "DOB of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_dob",
            "name" => "mss_admin_doctor_dob",
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_dob() ) ) ) {
            $result[ 'value' ] = $form_values->get_dob();
        }

        return $result;
    }

    /**
     * @since 1.0.0
     * * */
    private function phone_number_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "header" => esc_html( "Phone Number", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Phone Number of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_phone_num",
            "name" => "mss_admin_doctor_phone_num",
        ];
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_phone_num" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_phone_num" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_phone_number() ) ) ) {
            $result[ 'value' ] = $form_values->get_phone_number();
        }

        return $result;
    }

    /**
     * @since 1.0.0
     * * */
    private function email_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "type" => "email",
            "header" => esc_html( "Email", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Email of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_email",
            "name" => "mss_admin_doctor_email",
        ];
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_email" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_email" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_email() ) ) ) {
            $result[ 'value' ] = $form_values->get_email();
        }

        return $result;
    }

    /**
     * @since 1.0.0
     * * */
    private function nationality_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "header" => esc_html( "Nationality", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Nationality of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_nationality",
            "name" => "mss_admin_doctor_nationality",
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_nationality" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_nationality" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_nationality() ) ) ) {
            $result[ 'value' ] = $form_values->get_nationality();
        }

        return $result;
    }

    /**
     * @since 1.0.0
     * ** */
    private function address_text_area_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [];

        $result = [
            "header" => esc_html( "Address", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Address of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_address",
            "name" => "mss_admin_doctor_address",
            "classes" => [ "regular-text" ],
            "extra_attr" => [
                "rows" => "5",
                "cols" => "30"
            ],
        ];
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_address" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_address" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_address() ) ) ) {
            $result[ 'value' ] = $form_values->get_address();
        }
        return $result;
    }

    /**
     * @since 1.0.0
     * * */
    private function website_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result =  [
            "type" => "url",
            "header" => esc_html( "Website", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Website of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_website",
            "name" => "mss_admin_doctor_website",
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_website" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_website" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_website() ) ) ) {
            $result[ 'value' ] = $form_values->get_website();
        }
        return $result;
    }
}
