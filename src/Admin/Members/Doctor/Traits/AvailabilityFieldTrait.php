<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use MedixSolutionSuite\Enums\ConsoltationTypeEnum;
use WP_Error;

if ( !trait_exists( "AvailabilityFieldTrait" ) ) {

    trait AvailabilityFieldTrait {

        /**
         * Adding Specialization
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function working_days_select_field( WP_Error|DoctorDTO $form_values = null ): ?array {

            $result = [
                "header" => __( "Working Days", MSS_TEXT_DOMAIN ),
                "classes" => [ "regular-text", "select2-select" ],
                "id" => "mss_admin_doctor_working_days",
                "name" => "mss_admin_doctor_working_days",
                "error" => false,
                "options" => apply_filters( "mss_doctor_working_days", [
                    "monday" => __( "Monday", MSS_TEXT_DOMAIN ),
                    "tuesday" => __( "Tuesday", MSS_TEXT_DOMAIN ),
                    "wednesday" => __( "Wednesday", MSS_TEXT_DOMAIN ),
                    "thursday" => __( "Thursday", MSS_TEXT_DOMAIN ),
                    "friday" => __( "Friday", MSS_TEXT_DOMAIN ),
                    "saturday" => __( "Saturday", MSS_TEXT_DOMAIN ),
                    "sunday" => __( "Sunday", MSS_TEXT_DOMAIN ),
                ] )
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_specialization" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_specialization" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_working_days() ) ) ) {
                $result[ 'selected' ] = $form_values->get_working_days();
            }

            return $result;
        }
        
        /**
         * Consultation Type
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function consultation_type_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Consultation Type", MSS_TEXT_DOMAIN ),
                "type" => "checkbox",
                "options" => [
                    [
                        "value" => esc_html( ConsoltationTypeEnum::INPERSON->value ),
                        "label" => __( "In-Person", MSS_TEXT_DOMAIN ),
                        "id" => "mss_admin_doctor_consultation_type_in_person",
                        "name" => "mss_admin_doctor_consultation_type",
                        "classes" => [ "regular-text", "full_time" ],
                        "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_consultation_type() ) ) && $form_values->get_consultation_type() === ConsoltationTypeEnum::INPERSON->value ?  ConsoltationTypeEnum::INPERSON->value : "" ,
                    ],
                    [
                        "value" => esc_html( ConsoltationTypeEnum::ONLINE->value ),
                        "label" => esc_html( "Online", MSS_TEXT_DOMAIN ),
                        "id" => "mss_admin_doctor_employment_type_online",
                        "name" => "mss_admin_doctor_consultation_type",
                        "classes" => [ "regular-text", "part_time" ],
                        "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_consultation_type() ) ) && $form_values->get_consultation_type() === ConsoltationTypeEnum::ONLINE->value ? ConsoltationTypeEnum::ONLINE->value : "" ,
                    ],
                    
                ]
            ];
//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_gender" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_gender" );
//            }

            return $result;
        }
    }

}
