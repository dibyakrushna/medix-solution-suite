<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

if ( !trait_exists( "EducationalQualificationFieldTrait" ) ) {

    trait EducationalQualificationFieldTrait {

        /**
         * Degrees
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function degrees_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Degrees", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_degrees",
                "name" => "mss_admin_doctor_degrees",
                "description" => esc_html( "e.g., MBBS, MD", MSS_TEXT_DOMAIN )
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
//            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_dob() ) ) ) {
//                $result[ 'value' ] = $form_values->get_dob();
//            }

            return $result;
        }

        /**
         * College/University Attended
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function university_attended_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "College/University Attended", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_university_attended",
                "name" => "mss_admin_doctor_university_attended",
                "description" => esc_html( "e.g.,Burla medical college", MSS_TEXT_DOMAIN )
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
//            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_dob() ) ) ) {
//                $result[ 'value' ] = $form_values->get_dob();
//            }

            return $result;
        }

        /**
         * Year of Graduation
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function graduation_year_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Year of Graduation", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_graduation_year",
                "name" => "mss_admin_doctor_graduation_year",
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
//            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_dob() ) ) ) {
//                $result[ 'value' ] = $form_values->get_dob();
//            }

            return $result;
        }

        /**
         * Affiliations
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function affiliations_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Affiliations", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_affiliations",
                "name" => "mss_admin_doctor_affiliations",
                "description" => esc_html( "e.g., Member of National Medical Association", MSS_TEXT_DOMAIN )
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
//            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_dob() ) ) ) {
//                $result[ 'value' ] = $form_values->get_dob();
//            }

            return $result;
        }

        /**
         * Certifications and Accreditation
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function certifications_accreditations_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "file",
                "header" => esc_html( "Certifications and Accreditation", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_certifications_accreditations",
                "name" => "mss_admin_doctor_certifications_accreditations",
                "description" => esc_html( "e.g., FRCS, MRCP", MSS_TEXT_DOMAIN )
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
//            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_dob() ) ) ) {
//                $result[ 'value' ] = $form_values->get_dob();
//            }

            return $result;
        }
    }

}
