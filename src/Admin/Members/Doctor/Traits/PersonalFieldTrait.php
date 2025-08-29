<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Enums\GenderEnum;
use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

trait PersonalFieldTrait {

    /**
     * Adding first name
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function first_name_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = array();
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_first_name" ) ) ) ) {
            $result[ "error" ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_first_name" );
        }
        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_first_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_first_name();
        }
        return $result;
    }

    /**
     * Adding last name
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function last_name_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {

        $result = [
            "id" => "mss_admin_doctor_last_name",
            "name" => "mss_admin_doctor_last_name",
            "error" => false,
            "header" => esc_html( "Last Name", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Last name of doctor", MSS_TEXT_DOMAIN ),
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_last_name" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_last_name" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_last_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_last_name();
        }

        return $result;
    }

  /**
     * Adding gender
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function gender_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "header" => esc_html( "Gender", MSS_TEXT_DOMAIN ),
            "type" => "radio",
            "options" => [
                [
                    "value" => esc_html( GenderEnum::FEMALE->value ),
                    "label" => __( "Female", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_female",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text" ],
                    "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_gender() ) ) && $form_values->get_gender() === GenderEnum::FEMALE->value,
                ],
                [
                    "value" => esc_html( GenderEnum::MALE->value ),
                    "label" => esc_html( "Male", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_male",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text" ],
                    "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_gender() ) ) && $form_values->get_gender() === GenderEnum::MALE->value,
                ],
                [
                    "value" => esc_html( GenderEnum::OTHER->value ),
                    "label" => esc_html( "Other", MSS_TEXT_DOMAIN ),
                    "id" => "mss_admin_doctor_gender_other",
                    "name" => "mss_admin_doctor_gender",
                    "classes" => [ "regular-text", "other" ],
                    "selected" => !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_gender() ) ) && $form_values->get_gender() === GenderEnum::OTHER->value,
                ]
            ]
        ];
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_gender" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_gender" );
        }

        return $result;
    }

   /**
     * Adding DOB
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function dob_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "type" => "date",
            "header" => esc_html( "DOB", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "DOB of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_dob",
            "name" => "mss_admin_doctor_dob",
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_dob" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_dob" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_dob() ) ) ) {
            $result[ 'value' ] = $form_values->get_dob();
        }

        return $result;
    }

    /**
     * Adding phone number
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function phone_number_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "header" => esc_html( "Phone Number", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Phone Number of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_phone_num",
            "name" => "mss_admin_doctor_phone_num",
        ];
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_phone_num" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_phone_num" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_phone_number() ) ) ) {
            $result[ 'value' ] = $form_values->get_phone_number();
        }

        return $result;
    }

   /**
     * Adding email
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function email_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "type" => "email",
            "header" => esc_html( "Email", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Email of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_email",
            "name" => "mss_admin_doctor_email",
        ];
        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_email" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_email" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_email() ) ) ) {
            $result[ 'value' ] = $form_values->get_email();
        }

        return $result;
    }

   

   

   /**
     * Adding Website url
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function website_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "type" => "url",
            "header" => esc_html( "Website", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Website of doctor", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_website",
            "name" => "mss_admin_doctor_website",
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_website" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_website" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_website() ) ) ) {
            $result[ 'value' ] = $form_values->get_website();
        }
        return $result;
    }
    /**
     * Adding profile picture
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function profile_picture_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
         $result = [
            "type" => "file",
            "header" => esc_html( "Profile Picture", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Profile Picture", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_profile_picture",
            "name" => "mss_admin_doctor_profile_picture",
        ];
        return $result;
        
    }
    /**
     * Adding Address House Number
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function house_number(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "House Number", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "House Number", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_house_number",
            "name" => "mss_admin_doctor_house_number",
        ];
        return $result;
        
    }
    
    /**
     * Adding Street Name
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function street_name(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "Street Name", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Street Name", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_street_name",
            "name" => "mss_admin_doctor_street_name",
        ];
        return $result;
        
    }
    
    /**
     * Adding Landmark
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function landmark(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "Landmark", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Landmark", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_landmark",
            "name" => "mss_admin_doctor_landmark",
        ];
        return $result;
        
    }
     /**
     * Adding Address Line 1
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function address_line_1(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "Address Line 1", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Address Line 1", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_address_line_1",
            "name" => "mss_admin_doctor_address_line_1",
        ];
        return $result;
        
    }
     /**
     * Adding Address Line 2
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function address_line_2(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "Address Line 2", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Address Line 2", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_address_line_2",
            "name" => "mss_admin_doctor_address_line_2",
        ];
        return $result;
        
    }
     /**
     * Adding Address City
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function city(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "City", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "City", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_city",
            "name" => "mss_admin_doctor_city",
        ];
        return $result;
        
    }
    /**
     * Adding Address State
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function state(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "State", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "State", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_state",
            "name" => "mss_admin_doctor_state",
        ];
        return $result;
        
    }
     /**
     * Adding Address Postal Code
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function postal_code(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "Postcode / ZIP", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Postcode / ZIP", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_postal_code",
            "name" => "mss_admin_doctor_postal_code",
        ];
        return $result;
        
    }
     /**
     * Adding Address Country
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     * **/
    private function country(  WP_Error|DoctorDTO $form_values = null ):?array{
        
         $result = [
            "type" => "text",
            "header" => esc_html( "Country", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Country", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_country",
            "name" => "mss_admin_doctor_country",
        ];
        return $result;
        
    }
}
