<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use WP_Error;

if ( !trait_exists( "DoctorPersonalInfoValidationTrait" ) ) {

    trait DoctorPersonalInfoValidationTrait {

        private function validate_personal_info( Request $request, WP_Error $errors ) {
            if ( !$request->has( 'mss_admin_doctor_first_name' ) || empty( $request->input( 'mss_admin_doctor_first_name' ) ) ) {
                $errors->add( 'mss_admin_doctor_first_name', __( "First name is required", MSS_TEXT_DOMAIN ) );
            }
            if ( !$request->has( 'mss_admin_doctor_gender' ) || empty( $request->input( 'mss_admin_doctor_gender' ) ) ) {
                $errors->add( 'mss_admin_doctor_gender', __( "Gender is required", MSS_TEXT_DOMAIN ) );
            }
            if ( !$request->has( 'mss_admin_doctor_dob' ) || empty( $request->input( 'mss_admin_doctor_dob' ) ) ) {
                $errors->add( 'mss_admin_doctor_dob', __( "DOB is required", MSS_TEXT_DOMAIN ) );
            }
            if ( !$request->has( 'mss_admin_doctor_email' ) || !filter_var( $request->input( 'mss_admin_doctor_email' ), FILTER_VALIDATE_EMAIL ) ) {
                $errors->add( 'mss_admin_doctor_email', __( "Valid email is required", MSS_TEXT_DOMAIN ) );
            }
            if ( $request->hasFile( "mss_admin_doctor_profile_picture" ) && $request->fileSize( "mss_admin_doctor_profile_picture" ) > (5 * 1024 * 1024) ) {
                $wp_error->add( "mss_admin_doctor_profile_picture", __( "File size cannot be more then 5 mb", MSS_TEXT_DOMAIN ) );
            }
            if ( $request->hasFile( "mss_admin_doctor_profile_picture" ) && $request->fileMimeType( "mss_admin_doctor_profile_picture" ) && !in_array( $request->fileMimeType( "mss_admin_doctor_profile_picture" ), [ "image/jpeg", "image/png" ] ) ) {
                $wp_error->add( "mss_admin_doctor_profile_picture", __( "Only JPG, and PNG images are allowed", MSS_TEXT_DOMAIN ) );
            }
        }
    }

}