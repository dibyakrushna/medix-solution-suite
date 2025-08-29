<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

if ( !trait_exists( "AdditionalInfoFieldTrait" ) ) {

    trait AdditionalInfoFieldTrait {

        /**
         * Language Spoken
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function language_spoken_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "text",
                "header" => esc_html( "Languages Spoken", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_language_spoken",
                "name" => "mss_admin_doctor_language_spoken",
                
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
         * Short Biography
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function short_biography_textarea_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Short Biography", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_short_biography",
                "name" => "mss_admin_doctor_short_biography",
                "classes" =>  ["regular-text" ]
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
         * Social Media Profile Link
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function social_media_profile_link_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                 "type" => "text",
                "header" => esc_html( "Social Media Profile Link", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_social_media_profile_link",
                "name" => "mss_admin_doctor_social_media_profile_link",
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
         * Personal Statement
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function personal_statement_textarea_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Personal Statement", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_personal_statement",
                "name" => "mss_admin_doctor_personal_statement",
                "classes" =>  ["regular-text" ]
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