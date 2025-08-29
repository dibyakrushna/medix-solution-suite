<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\FormBuilder\FormBuilder;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\PersonalFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\ProfessionalFieldTrait;
use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

trait BuildFormComponentTrait {

    use PersonalFieldTrait,
        ProfessionalFieldTrait;

    /**
     * Initial point to build the for 
     * 
     * @param  WP_Error|DoctorDTO $value
     * @return string
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * ** */
    private function build_component( WP_Error|DoctorDTO $value = null ): ?string {

        $form_builder_components = $this->personal_form_component( $value );
        $personal_table_component = FormBuilder::get_form_component( 'table', $this->build_table_attr() );
        $form_componet = FormBuilder::get_form_component( 'form', $this->build_form_attr() );

        do_action( "mss_admin_doctor_personal_input_before", $personal_table_component );

        foreach ( $form_builder_components as $component_key => $component_value ) {
            $personal_table_component->add( $component_value );
        }
        do_action( "mss_admin_doctor_personal_input_after", $personal_table_component );

        $form_componet->add( $personal_table_component );
        
        //Profetionl 
        $professinoal_form_builder_components = $this->professional_form_component( $value );
        $professional_table_component = FormBuilder::get_form_component( 'table', $this->build_professional_table_attr() );

        do_action( "mss_admin_doctor_professinoal_input_before", $professional_table_component );

        foreach ( $professinoal_form_builder_components as $professinoal_component_key => $professinoal_component_value ) {
            $professional_table_component->add( $professinoal_component_value );
        }
        do_action( "mss_admin_doctor_professinoal_input_after", $professional_table_component );

        $form_componet->add( $professional_table_component );
        
        //Profetionl 
        $educational_qualification_form_builder_component = $this->educational_qualification_form_component( $value );
        $educational_qualification_table_component = FormBuilder::get_form_component( 'table', $this->build_educational_qualification_table_attr() );

        do_action( "mss_admin_doctor_educational_qualification_input_before", $educational_qualification_table_component );

        foreach ( $educational_qualification_form_builder_component as $educational_qualification_component_key => $educational_qualification_component_value ) {
            $educational_qualification_table_component->add( $educational_qualification_component_value );
        }
        do_action( "mss_admin_doctor_educational_qualification_input_after", $educational_qualification_table_component );

        $form_componet->add( $educational_qualification_table_component );

        return $form_componet->render();
    }

    /**
     * Personal Form Component 
     * @param  WP_Error|DoctorDTO $value
     * @return Array
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * ** */
    private function personal_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {
        $componets = [
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->first_name_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->last_name_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->gender_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->dob_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->email_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->phone_number_input_field( $form_values ) ) ),
            // FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->nationality_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->house_number( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->street_name( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->landmark( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->address_line_1( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->address_line_2( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->city( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->state( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->postal_code( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->country( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->website_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->profile_picture_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_personal_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function professional_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->specialization_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->year_of_experience_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->medical_registration_number_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consulation_fee_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certificate_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_professinoal_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function educational_qualification_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->specialization_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->year_of_experience_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->medical_registration_number_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consulation_fee_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certificate_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_professinoal_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function availability_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->specialization_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->year_of_experience_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->medical_registration_number_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consulation_fee_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certificate_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_professinoal_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function employement_info_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->specialization_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->year_of_experience_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->medical_registration_number_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consulation_fee_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certificate_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_professinoal_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function emergency_conatct_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->specialization_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->year_of_experience_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->medical_registration_number_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consulation_fee_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certificate_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_professinoal_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function system_access_permission_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->specialization_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->year_of_experience_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->medical_registration_number_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consulation_fee_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certificate_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_professinoal_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function aditional_info_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->specialization_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->year_of_experience_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->medical_registration_number_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consulation_fee_iput_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certificate_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_professinoal_form_componet", $componets, $form_values );
    }

    private function build_input_attr( $attr = [] ): ?array {
        $default_attr = [
            "type" => "text",
            "name" => "mss_admin_doctor_first_name",
            "id" => "mss_admin_doctor_first_name",
            "extra_attr" => [],
            "classes" => [ "regular-text" ],
            "label" => esc_html( "First name of doctor", MSS_TEXT_DOMAIN ),
            "header" => esc_html( "First Name", MSS_TEXT_DOMAIN ),
            "options" => []
        ];
        $attr = array_merge( $default_attr, $attr );
        return $attr;
    }

    private function build_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "Personal Information", MSS_TEXT_DOMAIN )
        ];
        $attr = array_merge( $default_attr, $attr );
        return $attr;
    }

    /**
     * Professional Table component
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return Array Table attribute
     */
    private function build_professional_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "Professional Information", MSS_TEXT_DOMAIN )
        ];
        $attr = array_merge( $default_attr, $attr );
        return $attr;
    }
    
    /**
     * Educational Table component
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return Array Table attribute
     */
    private function build_educational_qualification_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "Educational and Professional Qualifications", MSS_TEXT_DOMAIN )
        ];
        $attr = array_merge( $default_attr, $attr );
        return $attr;
    }
    private function build_form_attr( $attrs = [] ): ?array {

        $default_attr = [
            "id" => "mss-doctor-form",
            "method" => "POST",
            "action" => esc_url( admin_url( "admin.php" ) . "?page=mss_members&controller=doctor&action=save" ),
            "extra_attr" => [],
            "classes" => [ "mss-admin-doctor" ],
        ];

        $attrs = array_merge( $default_attr, $attrs );
        return $attrs;
    }
}
