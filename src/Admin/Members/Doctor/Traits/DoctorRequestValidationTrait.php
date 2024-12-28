<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\DoctorRequestDTO;

trait DoctorRequestValidationTrait {

    private function validate( Request $request, DoctorRequestDTO $doctorRequstDto ): DoctorRequestDTO {
        if ( !$request->isPost() )
            throw new \ErrorException( __( "It should a post method", MSS_TEXT_DOMAIN ) );

        if ( !check_admin_referer() )
            throw new \ErrorException( __( "Nonce not valid", MSS_TEXT_DOMAIN ) );

        //Checking first name is empty
        if ( $request->has( 'mss_admin_doctor_first_name' ) && !empty( $request->input( "mss_admin_doctor_first_name" ) ) ) {
            $doctorRequstDto->setFirstName( $request->input( "mss_admin_doctor_first_name" ) );
        } else {
            throw new \ErrorException( __( "First name is must", MSS_TEXT_DOMAIN ) );
        }

        if ( $request->has( 'mss_admin_doctor_last_name' ) && !empty( $request->input( "mss_admin_doctor_last_name" ) ) ) {
            $doctorRequstDto->setLastName( $request->input( "mss_admin_doctor_last_name" ) );
        }

        //Checking Gender  is empty
        if ( $request->has( 'mss_admin_doctor_gender' ) && !empty( $request->input( "mss_admin_doctor_gender" ) ) ) {
            $doctorRequstDto->setGender( $request->input( "mss_admin_doctor_gender" ) );
        } else {
            throw new \ErrorException( __( "Gender is required", MSS_TEXT_DOMAIN ) );
        }

        //Checking email is empty
        if ( $request->has( 'mss_admin_doctor_email' ) && !empty( $request->input( "mss_admin_doctor_email" ) ) && filter_var( $request->input( "mss_admin_doctor_email" ), FILTER_VALIDATE_EMAIL ) ) {
            $doctorRequstDto->setEmail( $request->input( "mss_admin_doctor_gender" ) );
        } else {
            throw new \ErrorException( __( "Eail is required or email is not valid", MSS_TEXT_DOMAIN ) );
        }

        //Check phone number

        if ( $request->has( 'mss_admin_doctor_phone_num' ) && !empty( $request->input( "mss_admin_doctor_phone_num" ) ) ) {
            $doctorRequstDto->setPhoneNumber( $request->input( "mss_admin_doctor_phone_num" ) );
        }

        //check Nationality
        if ( $request->has( 'mss_admin_doctor_nationality' ) && !empty( $request->input( "mss_admin_doctor_nationality" ) ) ) {
            $doctorRequstDto->setNtionality( $request->input( "mss_admin_doctor_nationality" ) );
        } else {
            throw new \ErrorException( __( "Nationality is required", MSS_TEXT_DOMAIN ) );
        }

        //Check phone number

        if ( $request->has( 'mss_admin_doctor_website' ) && !empty( $request->input( "mss_admin_doctor_website" ) ) ) {
            $doctorRequstDto->setWebsite( $request->input( "mss_admin_doctor_website" ) );
        }
        
         //Check Address
        if ( $request->has( 'mss_admin_doctor_address' ) && !empty( $request->input( "mss_admin_doctor_address" ) ) ) {
            $doctorRequstDto->setAddress( $request->input( "mss_admin_doctor_address" ) );
        } else {
            throw new \ErrorException( __( "Address is required", MSS_TEXT_DOMAIN ) );
        }
        
        return $doctorRequstDto;
    }
}
