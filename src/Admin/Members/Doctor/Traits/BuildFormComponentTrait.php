<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\FormBuilder\FormBuilder;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\PersonalFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\ProfessionalFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\AdditionalInfoFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\EmergencyContactFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\EmployementIfoFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\EducationalQualificationFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\AvailabilityFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\SystemAccessPermissionFieldTrait;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\HiddenFieldTrait;
use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

trait BuildFormComponentTrait {

    use PersonalFieldTrait,
        ProfessionalFieldTrait,
        AdditionalInfoFieldTrait,
        EmergencyContactFieldTrait,
        EmployementIfoFieldTrait,
        EducationalQualificationFieldTrait,
        AvailabilityFieldTrait,
        SystemAccessPermissionFieldTrait,
            HiddenFieldTrait;
        

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
        //ID
        $hidden_form_builder_component = $this->hidden_fild_component( $value ); 
        $hidden_table_component = FormBuilder::get_form_component( "table", $this->build_table_hidden_attr());
        
        foreach ($hidden_form_builder_component as $hidden_component_val){
            $hidden_table_component->add($hidden_component_val );
        }
        $form_componet->add($hidden_table_component);
        //Profetionl 
        $professinoal_form_builder_components = $this->professional_form_component( $value );
        $professional_table_component = FormBuilder::get_form_component( 'table', $this->build_professional_table_attr() );

        do_action( "mss_admin_doctor_professinoal_input_before", $professional_table_component );

        foreach ( $professinoal_form_builder_components as $professinoal_component_key => $professinoal_component_value ) {
            $professional_table_component->add( $professinoal_component_value );
        }
        do_action( "mss_admin_doctor_professinoal_input_after", $professional_table_component );

        $form_componet->add( $professional_table_component );

        //Educational 
        $educational_qualification_form_builder_component = $this->educational_qualification_form_component( $value );
        $educational_qualification_table_component = FormBuilder::get_form_component( 'table', $this->build_educational_qualification_table_attr() );

        do_action( "mss_admin_doctor_educational_qualification_input_before", $educational_qualification_table_component );

        foreach ( $educational_qualification_form_builder_component as $educational_qualification_component_key => $educational_qualification_component_value ) {
            $educational_qualification_table_component->add( $educational_qualification_component_value );
        }
        do_action( "mss_admin_doctor_educational_qualification_input_after", $educational_qualification_table_component );

        $form_componet->add( $educational_qualification_table_component );

        //Availability and Scheduling  
        $availability_scheduling_form_builder_component = $this->availability_form_component( $value );
        $availability_scheduling_table_component = FormBuilder::get_form_component( 'table', $this->build_availability_scheduling_table_attr() );

        do_action( "mss_admin_doctor_availability_scheduling_input_before", $availability_scheduling_table_component );

        foreach ( $availability_scheduling_form_builder_component as $availability_scheduling_component_key => $availability_scheduling_component_value ) {
            $availability_scheduling_table_component->add( $availability_scheduling_component_value );
        }
        do_action( "mss_admin_doctor_availability_scheduling_input_after", $availability_scheduling_table_component );

        $form_componet->add( $availability_scheduling_table_component );

        //Employment Information   
        $employment_info_form_builder_component = $this->employement_info_form_component( $value );
        $employment_info_table_component = FormBuilder::get_form_component( 'table', $this->build_employment_info_table_attr() );

        do_action( "mss_admin_doctor_employment_info_input_before", $employment_info_table_component );

        foreach ( $employment_info_form_builder_component as $employment_info_component_key => $employment_info_component_value ) {
            $employment_info_table_component->add( $employment_info_component_value );
        }
        do_action( "mss_admin_doctor_employment_info_input_after", $employment_info_table_component );

        $form_componet->add( $employment_info_table_component );

        //Emergency Contact Information  
        $emergency_contact_info_form_builder_component = $this->emergency_conatct_form_component( $value );
        $emergency_contact_info_table_component = FormBuilder::get_form_component( 'table', $this->build_emergency_contact_info_table_attr() );

        do_action( "mss_admin_doctor_emergency_contact_info_input_before", $emergency_contact_info_table_component );

        foreach ( $emergency_contact_info_form_builder_component as $emergency_contact_info_component_key => $emergency_contact_info_component_value ) {
            $emergency_contact_info_table_component->add( $emergency_contact_info_component_value );
        }
        do_action( "mss_admin_doctor_employment_info_input_after", $emergency_contact_info_table_component );

        $form_componet->add( $emergency_contact_info_table_component );

        //System Access and Permissions
        $system_access_form_builder_component = $this->system_access_permission_form_component( $value );
        $system_access_table_component = FormBuilder::get_form_component( 'table', $this->build_system_access_table_attr() );

        do_action( "mss_admin_doctor_system_access_input_before", $system_access_table_component );

        foreach ( $system_access_form_builder_component as $system_access_component_key => $system_access_component_value ) {
            $system_access_table_component->add( $system_access_component_value );
        }
        do_action( "mss_admin_system_access_input_after", $system_access_table_component );

        $form_componet->add( $system_access_table_component );
        //Additional Fields
        $additional_field_form_builder_component = $this->additional_info_form_component( $value );
        $additional_field_table_component = FormBuilder::get_form_component( 'table', $this->build_additional_field_table_attr() );

        do_action( "mss_admin_doctor_additional_field_input_before", $additional_field_table_component );

        foreach ( $additional_field_form_builder_component as $additional_field_component_value ) {
            $additional_field_table_component->add( $additional_field_component_value );
        }
        do_action( "mss_admin_system_access_input_after", $additional_field_table_component );

        $form_componet->add( $additional_field_table_component );

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
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->degrees_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->university_attended_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->graduation_year_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->affiliations_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->certifications_accreditations_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_educational_qualification_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function availability_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'select', $this->working_days_select_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->consultation_type_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_availability_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function employement_info_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->employment_type_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->department_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->date_of_joining_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->designation_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->supervisor_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_employement_info_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function emergency_conatct_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->emergency_contact_name_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->relationship_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->emergency_phone_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_emergency_conatct_form_componet", $componets, $form_values );
    }
     /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function hidden_fild_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'input',$this->id_input_field( $form_values )),
        ];
        return apply_filters( "mss_admin_doctor_hidden_input_component", $componets, $form_values );
    }

    /**r
     * 
     * @param type $attr
     * @return array|null
     */
    private function system_access_permission_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->username_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->nickname_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->display_name_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->password_input_field( $form_values ) ) ),
                //     FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->password_input_field( $form_values ) ) ),
        ];
        return apply_filters( "mss_admin_doctor_system_access_permission_form_componet", $componets, $form_values );
    }

    /**
     * 
     * @param type $attr
     * @return array|null
     */
    private function additional_info_form_component( WP_Error|DoctorDTO $form_values = null ): ?array {

        $componets = [
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->language_spoken_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'textarea', $this->short_biography_textarea_field( $form_values ) ),
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->social_media_profile_link_input_field( $form_values ) ) ),
            FormBuilder::get_form_component( 'textarea', $this->personal_statement_textarea_field( $form_values ) ),
        ];
        return apply_filters( "mss_admin_doctor_additional_info_form_componet", $componets, $form_values );
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
    
     private function build_table_hidden_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            
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
        return array_merge( $default_attr, $attr );
    }

    /**
     * Availability Table component
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return Array Table attribute
     */
    private function build_availability_scheduling_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "Availability and Scheduling", MSS_TEXT_DOMAIN )
        ];
        return array_merge( $default_attr, $attr );
    }

    /**
     * Availability Table component
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return Array Table attribute
     */
    private function build_employment_info_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "Employment Information", MSS_TEXT_DOMAIN )
        ];
        return array_merge( $default_attr, $attr );
    }

    /**
     * Emergency Contact Table component
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return Array Table attribute
     */
    private function build_emergency_contact_info_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "Emergency Contact Information", MSS_TEXT_DOMAIN )
        ];
        return array_merge( $default_attr, $attr );
    }

    /**
     * System Access Table component
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return Array Table attribute
     */
    private function build_system_access_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "System Access and Permissions", MSS_TEXT_DOMAIN )
        ];
        return array_merge( $default_attr, $attr );
    }

    /**
     * Additional Field Table component
     * @author dibya <dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return Array Table attribute
     */
    private function build_additional_field_table_attr( $attr = [] ): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => [ "role" => "presentation" ],
            "classes" => [ "form-table" ],
            "header" => esc_html( "Additional Fields", MSS_TEXT_DOMAIN )
        ];
        return array_merge( $default_attr, $attr );
    }

    private function build_form_attr( $attrs = [] ): ?array {

        $default_attr = [
            "id" => "mss-doctor-form",
            "method" => "POST",
            "action" => esc_url( admin_url( "admin.php" ) . "?page=mss_members&controller=doctor&action=save" ),
            "extra_attr" => [
                "enctype" => "multipart/form-data"
            ],
            "classes" => [ "mss-admin-doctor" ],
        ];

        return array_merge( $default_attr, $attrs );
    }
}
