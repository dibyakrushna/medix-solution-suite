<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;
use MedixSolutionSuite\Enums\EmploymentTypeEnum;

if ( !trait_exists( "EmployementIfoFieldTrait" ) ) {

    trait EmployementIfoFieldTrait {

        /**
         * Employment Type
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function employment_type_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Employment Type", MSS_TEXT_DOMAIN ),
                "type" => "radio",
                "options" => [
                    [
                        "value" => esc_html( EmploymentTypeEnum::FULLTIME->value ),
                        "label" => __( "Full Time", MSS_TEXT_DOMAIN ),
                        "id" => "mss_admin_doctor_employment_type_full_time",
                        "name" => "mss_admin_doctor_employment_type",
                        "classes" => [ "regular-text", "full_time" ],
                        "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_employment_type() ) ) && $form_values->get_employment_type() === EmploymentTypeEnum::FULLTIME->value ? EmploymentTypeEnum::FULLTIME->value : "",
                    ],
                    [
                        "value" => esc_html( EmploymentTypeEnum::PARTTIME->value ),
                        "label" => esc_html( "Part Time", MSS_TEXT_DOMAIN ),
                        "id" => "mss_admin_doctor_employment_type_part_time",
                        "name" => "mss_admin_doctor_employment_type",
                        "classes" => [ "regular-text", "part_time" ],
                        "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_employment_type() ) ) && $form_values->get_employment_type() === EmploymentTypeEnum::PARTTIME->value ? EmploymentTypeEnum::PARTTIME->value : "",
                    ],
                    [
                        "value" => esc_html( EmploymentTypeEnum::CONTRACT->value ),
                        "label" => esc_html( "Contract", MSS_TEXT_DOMAIN ),
                        "id" => "mss_admin_doctor_employment_type_contract",
                        "name" => "mss_admin_doctor_employment_type",
                        "classes" => [ "regular-text", "contract" ],
                        "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_employment_type() ) ) && $form_values->get_employment_type() === EmploymentTypeEnum::CONTRACT->value ? EmploymentTypeEnum::CONTRACT->value : "",
                    ]
                ]
            ];
//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_gender" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_gender" );
//            }

            return $result;
        }

        /**
         * Department
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function department_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "text",
                "header" => esc_html( "Department", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_department",
                "name" => "mss_admin_doctor_department",
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_department() ) ) ) {
                $result[ 'value' ] = $form_values->get_department();
            }

            return $result;
        }

        /**
         * Date of Joining
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function date_of_joining_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "date",
                "header" => esc_html( "Date of Joining", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_date_of_joining",
                "name" => "mss_admin_doctor_date_of_joining",
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_date_of_joining() ) ) ) {
                $result[ 'value' ] = $form_values->get_date_of_joining();
            }

            return $result;
        }

        /**
         * Designation/Position
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function designation_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "text",
                "header" => esc_html( "Designation/Position", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_designation",
                "name" => "mss_admin_doctor_designation",
                "description" => esc_html( "e.g., Senior Consultant, Resident", MSS_TEXT_DOMAIN )
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_designation() ) ) ) {
                $result[ 'value' ] = $form_values->get_designation();
            }

            return $result;
        }
        
          /**
         * Supervisor
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function supervisor_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "text",
                "header" => esc_html( "Supervisor", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_supervisor",
                "name" => "mss_admin_doctor_supervisor",
                "description" => esc_html( "If applicable", MSS_TEXT_DOMAIN )
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_supervisor() ) ) ) {
                $result[ 'value' ] = $form_values->get_supervisor();
            }

            return $result;
        }
    }

}
