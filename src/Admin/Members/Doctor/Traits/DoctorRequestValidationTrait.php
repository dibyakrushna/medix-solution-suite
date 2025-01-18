<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use WP_Error;

trait DoctorRequestValidationTrait {

    private function validate( Request $request, DoctorRequestDTO $doctorRequstDto, WP_Error $wp_error ): DoctorRequestDTO|WP_Error {

        if ( !$request->isPost() )
            $wp_error->add( "methode_error", __( "It should a post method", MSS_TEXT_DOMAIN ) );

        if ( !check_admin_referer() )
            $wp_error->add( "nonce_error", __( "Nonce not valid", MSS_TEXT_DOMAIN ) );

        //Checking first name is empty
        if ( $request->has( 'mss_admin_doctor_first_name' ) && !empty( $request->input( "mss_admin_doctor_first_name" ) ) ) {
            $doctorRequstDto->set_first_name( $request->input( "mss_admin_doctor_first_name" ) );
        } else {
            $wp_error->add( "mss_admin_doctor_first_name", __( "First name is must", MSS_TEXT_DOMAIN ) );
        }

        if ( $request->has( 'mss_admin_doctor_last_name' ) && !empty( $request->input( "mss_admin_doctor_last_name" ) ) ) {
            $doctorRequstDto->set_last_name( $request->input( "mss_admin_doctor_last_name" ) );
        }

        //Checking Gender  is empty
        if ( $request->has( 'mss_admin_doctor_gender' ) && !empty( $request->input( "mss_admin_doctor_gender" ) ) ) {
            $doctorRequstDto->set_gender( $request->input( "mss_admin_doctor_gender" ) );
        } else {
            $wp_error->add( "mss_admin_doctor_gender", __( "Gender is required", MSS_TEXT_DOMAIN ) );
        }

        //Checking email is empty
        if ( $request->has( 'mss_admin_doctor_email' ) && !empty( $request->input( "mss_admin_doctor_email" ) ) && filter_var( $request->input( "mss_admin_doctor_email" ), FILTER_VALIDATE_EMAIL ) ) {
            $doctorRequstDto->set_email( $request->input( "mss_admin_doctor_gender" ) );
        } else {
            $wp_error->add( "mss_admin_doctor_email", __( "Eail is required or email is not valid", MSS_TEXT_DOMAIN ) );
        }

        //Check phone number

        if ( $request->has( 'mss_admin_doctor_phone_num' ) && !empty( $request->input( "mss_admin_doctor_phone_num" ) ) ) {
            $doctorRequstDto->set_phone_number( $request->input( "mss_admin_doctor_phone_num" ) );
        }

        //check Nationality
        if ( $request->has( 'mss_admin_doctor_nationality' ) && !empty( $request->input( "mss_admin_doctor_nationality" ) ) ) {
            $doctorRequstDto->set_nationality( $request->input( "mss_admin_doctor_nationality" ) );
        } else {
            $wp_error->add( "mss_admin_doctor_nationality", __( "Nationality is required", MSS_TEXT_DOMAIN ) );
        }

        //Check phone number

        if ( $request->has( 'mss_admin_doctor_website' ) && !empty( $request->input( "mss_admin_doctor_website" ) ) ) {
            $doctorRequstDto->setWebsite( $request->input( "mss_admin_doctor_website" ) );
        }

        //Check Address
        if ( $request->has( 'mss_admin_doctor_address' ) && !empty( $request->input( "mss_admin_doctor_address" ) ) ) {
            $doctorRequstDto->set_address( $request->input( "mss_admin_doctor_address" ) );
        } else {
            $wp_error->add( "mss_admin_doctor_address", __( "Address is required", MSS_TEXT_DOMAIN ) );
        }
        if( is_wp_error( $wp_error )){
            return $wp_error;
        }

        return $doctorRequstDto;
    }
}
