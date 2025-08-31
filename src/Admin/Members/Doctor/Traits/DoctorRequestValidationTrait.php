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

        //Checking DOB  is empty
        if ( $request->has( 'mss_admin_doctor_dob' ) && !empty( $request->input( "mss_admin_doctor_dob" ) ) ) {
            $doctorRequstDto->set_dob( $request->input( "mss_admin_doctor_dob" ) );
        } else {
            $wp_error->add( "mss_admin_doctor_dob", __( "DOB is required", MSS_TEXT_DOMAIN ) );
        }


        //Checking email is empty
        if ( $request->has( 'mss_admin_doctor_email' ) && !empty( $request->input( "mss_admin_doctor_email" ) ) && filter_var( $request->input( "mss_admin_doctor_email" ), FILTER_VALIDATE_EMAIL ) ) {
            $doctorRequstDto->set_email( $request->input( "mss_admin_doctor_email" ) );
        } else {
            $wp_error->add( "mss_admin_doctor_email", __( "Eail is required or email is not valid", MSS_TEXT_DOMAIN ) );
        }

        //Check phone number

        if ( $request->has( 'mss_admin_doctor_phone_num' ) && !empty( $request->input( "mss_admin_doctor_phone_num" ) ) ) {
            $doctorRequstDto->set_phone_number( $request->input( "mss_admin_doctor_phone_num" ) );
        }

        //check Nationality
//        if ( $request->has( 'mss_admin_doctor_nationality' ) && !empty( $request->input( "mss_admin_doctor_nationality" ) ) ) {
//            $doctorRequstDto->set_nationality( $request->input( "mss_admin_doctor_nationality" ) );
//        } else {
//            $wp_error->add( "mss_admin_doctor_nationality", __( "Nationality is required", MSS_TEXT_DOMAIN ) );
//        }
        //Check phone number
//        if ( $request->has( 'mss_admin_doctor_website' ) && !empty( $request->input( "mss_admin_doctor_website" ) ) ) {
//            $doctorRequstDto->setWebsite( $request->input( "mss_admin_doctor_website" ) );
//        }
        //Check Address
//        if ( $request->has( 'mss_admin_doctor_address' ) && !empty( $request->input( "mss_admin_doctor_address" ) ) ) {
//            $doctorRequstDto->set_address( $request->input( "mss_admin_doctor_address" ) );
//        } else {
//            $wp_error->add( "mss_admin_doctor_address", __( "Address is required", MSS_TEXT_DOMAIN ) );
//        }
        if ( $request->hasFile( "mss_admin_doctor_profile_picture" ) && $request->fileSize( "mss_admin_doctor_profile_picture" ) > (5 * 1024 * 1024) ) {
            $wp_error->add( "mss_admin_doctor_profile_picture", __( "File size cannot be more then 5 mb", MSS_TEXT_DOMAIN ) );
        } else if ( $request->hasFile( "mss_admin_doctor_profile_picture" ) && $request->fileMimeType( "mss_admin_doctor_profile_picture" ) && !in_array( $request->fileMimeType( "mss_admin_doctor_profile_picture" ), [ "image/jpeg", "image/png" ] ) ) {
            $wp_error->add( "mss_admin_doctor_profile_picture", __( "Only JPG, and PNG images are allowed", MSS_TEXT_DOMAIN ) );
        } else {
            $doctorRequstDto->set_profile_picture( $request->file( "mss_admin_doctor_profile_picture" ) );
        }
        //checking adding house number
        if ( $request->has( "mss_admin_doctor_house_number" ) && !empty( $request->input( "mss_admin_doctor_house_number" ) ) ) {
            $house_number = $request->input( "mss_admin_doctor_house_number" );
            $doctorRequstDto->set_house_number( $house_number );
        }
        
         //checking adding Street name
        if ( $request->has( "mss_admin_doctor_street_name" ) && !empty( $request->input( "mss_admin_doctor_street_name" ) ) ) {
            $street_name = $request->input( "mss_admin_doctor_street_name" );
            $doctorRequstDto->set_street_name( $street_name );
        }
        
         //Land mark 
        if ( $request->has( "mss_admin_doctor_landmark" ) && !empty( $request->input( "mss_admin_doctor_landmark" ) ) ) {
            $land_mark = $request->input( "mss_admin_doctor_landmark" );
            $doctorRequstDto->set_landmark( $land_mark );
        }
        
          //Address line 1
        if ( $request->has( "mss_admin_doctor_address_line_1" ) && !empty( $request->input( "mss_admin_doctor_address_line_1" ) ) ) {
            $address_line_1 = $request->input( "mss_admin_doctor_address_line_1" );
            $doctorRequstDto->set_address_line1( $address_line_1 );
        }
        
          //Address line 2
        if ( $request->has( "mss_admin_doctor_address_line_2" ) && !empty( $request->input( "mss_admin_doctor_address_line_2" ) ) ) {
            $address_line_2 = $request->input( "mss_admin_doctor_address_line_2" );
            $doctorRequstDto->set_address_line2( $address_line_2 );
        }

          //City
        if ( $request->has( "mss_admin_doctor_city" ) && !empty( $request->input( "mss_admin_doctor_city" ) ) ) {
            $city = $request->input( "mss_admin_doctor_city" );
            $doctorRequstDto->set_city( $city );
        }
        if ( $wp_error->has_errors() ) {
            return $wp_error;
        }

        return $doctorRequstDto;
    }
}
