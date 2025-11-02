<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

if ( !trait_exists( "HiddenFieldTrait" ) ) {

    trait HiddenFieldTrait {

        /**
         * ID
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function id_input_field( WP_Error|DoctorDTO $form_values = null ): array {
            $result = [
                "id" => "mss_admin_doctor_id",
                "name" => "mss_admin_doctor_id",
                "type" => "hidden"
            ];

            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( $form_values->get_id() ) ) {
                $result[ 'value' ] = ( string ) $form_values->get_id() ?? 0;
            }
            return $result;
        }

        /**
         * Profile Image
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function profile_image_input_field( WP_Error|DoctorDTO $form_values = null ): array {
            $result = [
                "id" => "mss_admin_doctor_profile_picture_holder",
                "name" => "mss_admin_doctor_profile_picture_holder",
                "type" => "hidden"
            ];

            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( $form_values->get_id() ) ) {
                $result[ 'value' ] = json_encode( $form_values->get_profile_image() );
            }
            return $result;
        }

        /**
         * Medical License 
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function medical_licence_certificate_input_field( WP_Error|DoctorDTO $form_values = null ): array {
            $result = [
                "id" => "mss_admin_doctor_certificate_holder",
                "name" => "mss_admin_doctor_certificate_holder",
                "type" => "hidden"
            ];

            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( $form_values->get_medical_license_certificate() ) ) {
                $licence = $form_values->get_medical_license_certificate();
                $result[ 'value' ] = json_encode( $licence );
            }
            return $result;
        }

        /**
         * Educational Certificate 
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function educational_certificate_input_field( WP_Error|DoctorDTO $form_values = null ): array {
            $result = [
                "id" => "mss_admin_doctor_certifications_accreditations_holder",
                "name" => "mss_admin_doctor_certifications_accreditations_holder",
                "type" => "hidden"
            ];

            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( $form_values->get_educational_certificate() ) ) {
                $educational_certificate = $form_values->get_educational_certificate();
                $result[ 'value' ] = json_encode( $educational_certificate ); 
            }
            return $result;
        }
    }

}