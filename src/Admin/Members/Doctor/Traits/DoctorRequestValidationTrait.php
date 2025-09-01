<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use WP_Error;

trait DoctorRequestValidationTrait {

    private function validate( Request $request, DoctorRequestDTO $doctorRequstDto, WP_Error $wp_error ): DoctorRequestDTO|WP_Error {

        if ( !$request->isPost() ) {
            $wp_error->add( "methode_error", __( "It should a post method", MSS_TEXT_DOMAIN ) );
        }
        if ( !check_admin_referer() ) {
            $wp_error->add( "nonce_error", __( "Nonce not valid", MSS_TEXT_DOMAIN ) );
        }
        /*====PERSONALINFO===*/
        
        //Checking first name is empty
        if ( $request->has( 'mss_admin_doctor_first_name' ) && !empty( $request->input( "mss_admin_doctor_first_name" ) ) ) {
            $first_name = $request->input( "mss_admin_doctor_first_name" );
            $doctorRequstDto->set_first_name( sanitize_text_field( $first_name ) );
        } else {
            $wp_error->add( "mss_admin_doctor_first_name", __( "First name is must", MSS_TEXT_DOMAIN ) );
        }

        if ( $request->has( 'mss_admin_doctor_last_name' ) && !empty( $request->input( "mss_admin_doctor_last_name" ) ) ) {
            $last_name = $request->input( "mss_admin_doctor_last_name" );
            $doctorRequstDto->set_last_name( sanitize_text_field( $last_name ) );
        }

        //Checking Gender  is empty
        if ( $request->has( 'mss_admin_doctor_gender' ) && !empty( $request->input( "mss_admin_doctor_gender" ) ) ) {
            $gender = $request->input( "mss_admin_doctor_gender" );
            $doctorRequstDto->set_gender( sanitize_text_field( $gender ) );
        } else {
            $wp_error->add( "mss_admin_doctor_gender", __( "Gender is required", MSS_TEXT_DOMAIN ) );
        }

        //Checking DOB  is empty
        if ( $request->has( 'mss_admin_doctor_dob' ) && !empty( $request->input( "mss_admin_doctor_dob" ) ) ) {
            $dob = $request->input( "mss_admin_doctor_dob" );
            $doctorRequstDto->set_dob( sanitize_text_field( $dob ) );
        } else {
            $wp_error->add( "mss_admin_doctor_dob", __( "DOB is required", MSS_TEXT_DOMAIN ) );
        }


        //Checking email is empty
        if ( $request->has( 'mss_admin_doctor_email' ) && !empty( $request->input( "mss_admin_doctor_email" ) ) && filter_var( $request->input( "mss_admin_doctor_email" ), FILTER_VALIDATE_EMAIL ) ) {
            $email = $request->input( "mss_admin_doctor_email" );
            $doctorRequstDto->set_email( sanitize_email( $email ) );
        } else {
            $wp_error->add( "mss_admin_doctor_email", __( "Eail is required or email is not valid", MSS_TEXT_DOMAIN ) );
        }

        //Check phone number

        if ( $request->has( 'mss_admin_doctor_phone_num' ) && !empty( $request->input( "mss_admin_doctor_phone_num" ) ) ) {
            $phone_number = $request->input( "mss_admin_doctor_phone_num" );
            $doctorRequstDto->set_phone_number( sanitize_text_field( $phone_number ) );
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
        //Profile image
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
            $doctorRequstDto->set_house_number( sanitize_text_field( $house_number ) );
        }

        //checking adding Street name
        if ( $request->has( "mss_admin_doctor_street_name" ) && !empty( $request->input( "mss_admin_doctor_street_name" ) ) ) {
            $street_name = $request->input( "mss_admin_doctor_street_name" );
            $doctorRequstDto->set_street_name( sanitize_text_field( $street_name ) );
        }

        //Land mark 
        if ( $request->has( "mss_admin_doctor_landmark" ) && !empty( $request->input( "mss_admin_doctor_landmark" ) ) ) {
            $land_mark = $request->input( "mss_admin_doctor_landmark" );
            $doctorRequstDto->set_landmark( sanitize_text_field( $land_mark ) );
        }

        //Address line 1
        if ( $request->has( "mss_admin_doctor_address_line_1" ) && !empty( $request->input( "mss_admin_doctor_address_line_1" ) ) ) {
            $address_line_1 = $request->input( "mss_admin_doctor_address_line_1" );
            $doctorRequstDto->set_address_line1( sanitize_text_field( $address_line_1 ) );
        }

        //Address line 2
        if ( $request->has( "mss_admin_doctor_address_line_2" ) && !empty( $request->input( "mss_admin_doctor_address_line_2" ) ) ) {
            $address_line_2 = $request->input( "mss_admin_doctor_address_line_2" );
            $doctorRequstDto->set_address_line2( sanitize_text_field( $address_line_2 ) );
        }

        //City
        if ( $request->has( "mss_admin_doctor_city" ) && !empty( $request->input( "mss_admin_doctor_city" ) ) ) {
            $city = $request->input( "mss_admin_doctor_city" );
            $doctorRequstDto->set_city( sanitize_text_field( $city ) );
        }
        //State
        if ( $request->has( "mss_admin_doctor_state" ) && !empty( $request->input( "mss_admin_doctor_state" ) ) ) {
            $state = $request->input( "mss_admin_doctor_state" );
            $doctorRequstDto->set_state( sanitize_text_field( $state ) );
        }
        //Zipcode
        if ( $request->has( "mss_admin_doctor_postal_code" ) && !empty( $request->input( "mss_admin_doctor_postal_code" ) ) ) {
            $postal_code = $request->input( "mss_admin_doctor_postal_code" );
            $doctorRequstDto->set_postcode( sanitize_text_field( $postal_code ) );
        }
        //Country
        if ( $request->has( "mss_admin_doctor_country" ) && !empty( $request->input( "mss_admin_doctor_country" ) ) ) {
            $country = $request->input( "mss_admin_doctor_country" );
            $doctorRequstDto->set_country( sanitize_text_field( $country ) );
        }
        //website
        if ( $request->has( "mss_admin_doctor_website" ) && !empty( $request->input( "mss_admin_doctor_website" ) ) ) {
            $website = $request->input( "mss_admin_doctor_website" );
            $doctorRequstDto->set_website( sanitize_text_field( $website ) );
        }
        /**======Professional Info======**/
        //Specialization
        if ( $request->has( "mss_admin_doctor_specialization" ) && !empty( $request->input( "mss_admin_doctor_specialization" ) ) ) {
            $specialization = $request->input( "mss_admin_doctor_specialization" );
            $doctorRequstDto->set_specialization( sanitize_text_field( $specialization ) );
        }
        //Year of experience
        if ( $request->has( "mss_admin_doctor_year_of_experience" ) && !empty( $request->input( "mss_admin_doctor_year_of_experience" ) ) ) {
            $year_of_exp = $request->input( "mss_admin_doctor_year_of_experience" );
            $doctorRequstDto->set_year_of_experience( sanitize_text_field( $year_of_exp ) );
        }
        
         //Medical Registration Number
        if ( $request->has( "mss_admin_doctor_medical_registartion_number" ) && !empty( $request->input( "mss_admin_doctor_medical_registartion_number" ) ) ) {
            $med_reg_num = $request->input( "mss_admin_doctor_medical_registartion_number" );
            $doctorRequstDto->set_medical_registration_number( sanitize_text_field( $med_reg_num ) );
        }
         //Consultation Fees 
        if ( $request->has( "mss_admin_doctor_consulation_fee" ) && !empty( $request->input( "mss_admin_doctor_consulation_fee" ) ) ) {
            $consultion_fees = $request->input( "mss_admin_doctor_consulation_fee" );
            $doctorRequstDto->set_consultation_fees( sanitize_text_field( $consultion_fees ) );
        }
        //Medical License/Certificate 
        if ( $request->hasFile( "mss_admin_doctor_certificate" ) && $request->fileSize( "mss_admin_doctor_certificate" ) > (5 * 1024 * 1024) ) {
            $wp_error->add( "mss_admin_doctor_certificate", __( "File size cannot be more then 5 mb", MSS_TEXT_DOMAIN ) );
        } else if ( $request->hasFile( "mss_admin_doctor_certificate" ) && $request->fileMimeType( "mss_admin_doctor_certificate" ) && !in_array( $request->fileMimeType( "mss_admin_doctor_certificate" ), [ "image/jpeg", "image/png" ] ) ) {
            $wp_error->add( "mss_admin_doctor_certificate", __( "Only JPG, and PNG images are allowed", MSS_TEXT_DOMAIN ) );
        } else {
            $doctorRequstDto->set_medical_license( $request->file( "mss_admin_doctor_certificate" ) );
        }
        
        /*=====Educational and Professional Qualifications====*/
          //Degrees
        if ( $request->has( "mss_admin_doctor_degrees" ) && !empty( $request->input( "mss_admin_doctor_degrees" ) ) ) {
            $degree = $request->input( "mss_admin_doctor_degrees" );
            $doctorRequstDto->set_degrees( sanitize_text_field( $degree ) );
        }
         //College/University Attended 
        if ( $request->has( "mss_admin_doctor_university_attended" ) && !empty( $request->input( "mss_admin_doctor_university_attended" ) ) ) {
            $university = $request->input( "mss_admin_doctor_university_attended" );
            $doctorRequstDto->set_college_university( sanitize_text_field( $university ) );
        }
        //Year of Graduation 
        if ( $request->has( "mss_admin_doctor_graduation_year" ) && !empty( $request->input( "mss_admin_doctor_graduation_year" ) ) ) {
            $graduation_year = $request->input( "mss_admin_doctor_graduation_year" );
            $doctorRequstDto->set_year_of_graduation( sanitize_text_field( $graduation_year ) );
        }
         //Affiliations
        if ( $request->has( "mss_admin_doctor_affiliations" ) && !empty( $request->input( "mss_admin_doctor_affiliations" ) ) ) {
            $affiliations = $request->input( "mss_admin_doctor_affiliations" );
            $doctorRequstDto->set_affiliations( sanitize_text_field( $affiliations ) );
        }
        //Certifications and Accreditation
        if ( $request->hasFile( "mss_admin_doctor_certifications_accreditations" ) && $request->fileSize( "mss_admin_doctor_certifications_accreditations" ) > (5 * 1024 * 1024) ) {
            $wp_error->add( "mss_admin_doctor_certificate", __( "File size cannot be more then 5 mb", MSS_TEXT_DOMAIN ) );
        } else if ( $request->hasFile( "mss_admin_doctor_certifications_accreditations" ) && $request->fileMimeType( "mss_admin_doctor_certifications_accreditations" ) && !in_array( $request->fileMimeType( "mss_admin_doctor_certifications_accreditations" ), [ "image/jpeg", "image/png" ] ) ) {
            $wp_error->add( "mss_admin_doctor_certifications_accreditations", __( "Only JPG, and PNG images are allowed", MSS_TEXT_DOMAIN ) );
        } else {
            $doctorRequstDto->set_medical_license( $request->file( "mss_admin_doctor_certifications_accreditations" ) );
        }
        if ( $wp_error->has_errors() ) {
            return $wp_error;
        }

        return $doctorRequstDto;
    }
}
