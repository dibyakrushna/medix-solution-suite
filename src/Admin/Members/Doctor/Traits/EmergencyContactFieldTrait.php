<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

if ( !trait_exists( "EmergencyContactFieldTrait" ) ) {

    trait EmergencyContactFieldTrait {
        
         /**
         * Emergency Contact Name
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function emergency_contact_name_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "text",
                "header" => esc_html( "Emergency Contact Name", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_emergency_contact_name",
                "name" => "mss_admin_doctor_emergency_contact_name",
                
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_emergency_contact_name() ) ) ) {
                $result[ 'value' ] = $form_values->get_emergency_contact_name();
            }

            return $result;
        }
        
         /**
         * Relationship
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function relationship_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "text",
                "header" => esc_html( "Relationship", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_emergency_contact_relationship",
                "name" => "mss_admin_doctor_emergency_contact_relationship",
                
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_emergency_contact_relationship() ) ) ) {
                $result[ 'value' ] = $form_values->get_emergency_contact_relationship();
            }

            return $result;
        }
        
         /**
         * Emergency Contact Phone Number
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function emergency_phone_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "type" => "text",
                "header" => esc_html( "Emergency Contact Phone Number", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_emergency_phone_number",
                "name" => "mss_admin_doctor_emergency_phone_number",
                
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_emergency_contact_phone() ) ) ) {
                $result[ 'value' ] = $form_values->get_emergency_contact_phone();
            }

            return $result;
        }
    }

}