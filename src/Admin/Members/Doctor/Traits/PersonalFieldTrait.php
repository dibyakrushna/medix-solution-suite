<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Enums\GenderEnum;

trait PersonalFieldTrait {

    private function first_name_input_field( array $form_values ): ?array {

        return [
            "extra_attr" => function ( $form_values ): ?array {
                $result = [];
                if ( !is_null( $form_values[ 'mss_admin_doctor_first_name' ] ) ) {
                    $result[ 'value' ] = $form_values[ 'mss_admin_doctor_first_name' ];
                }
                return $result;
            },
        ];
    }

    /**
     * @since 1.0.0
     * * */
    private function last_name_input_field( array $form_values ): ?array {
        return [
            "header" => esc_html( "Last Name", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Last name of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_last_name",
            "name" => "mss_admin_doctor_last_name",
            "extra_attr" => function ( $form_values ): ?array {
                $result = [];
                if ( !is_null( $form_values[ 'mss_admin_doctor_first_name' ] ) ) {
                    $result[ 'value' ] = esc_attr( $form_values[ 'mss_admin_doctor_last_name' ] );
                }
                return $result;
            },
        ];
    }

    /**
     * @since 1.0.0
     * * */
    private function gender_input_field( array $form_values ): ?array {
        return [
            "header" => esc_html( "Gender", MSS_TEXT_DOMAIN ),
            "type" => "radio",
            "options" => [
                [
                    "value" => esc_html( GenderEnum::FEMALE->value ),
                    "label" => __( "Female", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_female",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text" ]
                ],
                [
                    "value" => esc_html( GenderEnum::MALE->value ),
                    "label" => esc_html( "Male", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_male",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text" ]
                ],
                [
                    "value" => esc_html( GenderEnum::OTHER->value ),
                    "label" => esc_html( "Other", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_other",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text", "other" ]
                ]
            ]
        ];
    }

    /**
     * @since 1.0.0
     * * */
    private function dob_input_field( array $form_values ): ?array {
        return [
            "type" => "date",
            "header" => esc_html( "DOB", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "DOB of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_dob",
            "name" => "mss_admin_doctor_dob",
            "extra_attr" => function ( $form_values ): ?array {
                $result = [];
                if ( !is_null( $form_values[ 'mss_admin_doctor_dob' ] ) ) {
                    $result[ 'value' ] = esc_attr( $form_values[ 'mss_admin_doctor_dob' ] );
                }
                return $result;
            },
        ];
    }

    /**
     * @since 1.0.0
     * * */
    private function phone_number_input_field( array $form_values ): ?array {
        return [
            "header" => esc_html( "Phone Number", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Phone Number of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_phone_num",
            "name" => "mss_admin_doctor_phone_num",
            "extra_attr" => function ( $form_values ): ?array {
                $result = [];
                if ( !is_null( $form_values[ 'mss_admin_doctor_phone_num' ] ) ) {
                    $result[ 'value' ] = esc_attr( $form_values[ 'mss_admin_doctor_phone_num' ] );
                }
                return $result;
            },
        ];
    }

    /**
     * @since 1.0.0
     * * */
    private function email_input_field( array $form_values ): ?array {
        return [
            "type" => "email",
            "header" => esc_html( "Email", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Email of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_email",
            "name" => "mss_admin_doctor_email",
            "extra_attr" => function ( $form_values ): ?array {
                $result = [];
                if ( !is_null( $form_values[ 'mss_admin_doctor_email' ] ) ) {
                    $result[ 'value' ] = esc_attr( $form_values[ 'mss_admin_doctor_email' ] );
                }
                return $result;
            },
        ];
    }

    /**
     * @since 1.0.0
     * * */
    private function nationality_input_field( array $form_values ): ?array {
        return [
            "header" => esc_html( "Nationality", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Nationality of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_nationality",
            "name" => "mss_admin_doctor_nationality",
            "extra_attr" => function ( $form_values ): ?array {
                $result = [];
                if ( !is_null( $form_values[ 'mss_admin_doctor_nationality' ] ) ) {
                    $result[ 'value' ] = esc_attr( $form_values[ 'mss_admin_doctor_nationality' ] );
                }
                return $result;
            },
        ];
    }

    /**
     * @since 1.0.0
     * ** */
    private function address_text_area_field( array $form_values ): ?array {
        $return = [];

        $return = [
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
        if ( !is_null( $form_values[ 'mss_admin_doctor_address' ] ) ) {
            $return[ 'value' ] = esc_attr( $form_values[ 'mss_admin_doctor_address' ] );
        }
        return $return;
    }

    /**
     * @since 1.0.0
     * * */
    private function website_input_field( array $form_values ): ?array {
        return [
            "type" => "url",
            "header" => esc_html( "Website", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Website of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_website",
            "name" => "mss_admin_doctor_website",
            "extra_attr" => function ( $form_values ): ?array {
                $result = [];
                if ( !is_null( $form_values[ 'mss_admin_doctor_website' ] ) ) {
                    $result[ 'value' ] = esc_attr( $form_values[ 'mss_admin_doctor_website' ] );
                }
                return $result;
            },
        ];
    }
}
