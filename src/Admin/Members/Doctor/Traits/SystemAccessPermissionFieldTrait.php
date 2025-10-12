<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

if ( !trait_exists( "SystemAccessPermissionFieldTrait" ) ) {

    trait SystemAccessPermissionFieldTrait {
        
         /**
         * Username
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function username_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Username(*)", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_username",
                "name" => "mss_admin_doctor_username",
                "description" => __("Usernames cannot be changed and for system login ", MSS_TEXT_DOMAIN)
            ];
            
            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "empty_user_login" ) ) ) ) {
                $result[ 'error' ] = true;
                $result[ 'description' ] = $form_values->get_error_message( "empty_user_login" );
            }
            
            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "user_login_too_long" ) ) ) ) {
                $result[ 'error' ] = true;
                $result[ 'description' ] = $form_values->get_error_message( "user_login_too_long" );
            }
            
            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "existing_user_login" ) ) ) ) {
                $result[ 'error' ] = true;
                $result[ 'description' ] = $form_values->get_error_message( "existing_user_login" );
            }

            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_username() ) ) ) {
                $result[ 'value' ] = $form_values->get_username();
            }
            
//            if(!is_null( $form_values ) && $form_values instanceof DoctorDTO &&  $form_values->get_id() > 0 ){
//                $result["extra_attr"] = ["disabled" => true ];
//            }
            return $result;
        }
        
         /**
         * Nickname 
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function nickname_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Nickname", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_nickname",
                "name" => "mss_admin_doctor_nickname",
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_nickname() ) ) ) {
                $result[ 'value' ] = $form_values->get_nickname();
            }

            return $result;
        }
        
         /**
         * Display name
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function display_name_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Display name", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_display_name",
                "name" => "mss_admin_doctor_display_name",
            ];

//            if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
//                $result[ 'error' ] = true;
//                $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
//            }
//
            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_display_name() ) ) ) {
                $result[ 'value' ] = $form_values->get_display_name();
            }

            return $result;
        }
        
          /**
         * Display name
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function password_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
            $result = [
                "header" => esc_html( "Password", MSS_TEXT_DOMAIN ),
                "id" => "mss_admin_doctor_password_button",
                "name" => "mss_admin_doctor_password_button",
                "type" => "password"
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
