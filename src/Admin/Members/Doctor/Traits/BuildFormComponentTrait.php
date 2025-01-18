<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\FormBuilder\FormBuilder;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\PersonalFieldTrait;
use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

trait BuildFormComponentTrait {

    use PersonalFieldTrait;

    private function build_component( WP_Error|DoctorDTO $value = null ): ?string {
       
        $form_builder_components = $this->formComponent( $value );
        $personal_table_component = FormBuilder::get_form_component( 'table', $this->build_table_attr() );
        $form_componet = FormBuilder::get_form_component( 'form', $this->build_form_attr() );

        do_action( "mss_admin_doctor_personal_input_before", $personal_table_component );

        foreach ( $form_builder_components as $component_key => $component_value ) {
            $personal_table_component->add( $component_value );
        }


        do_action( "mss_admin_doctor_personal_input_after", $personal_table_component );

        $form_componet->add( $personal_table_component );

        return $form_componet->render();
    }

    /**
     * Build Form Component 
     * @return Array
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * ** */
    private function formComponent( WP_Error|DoctorDTO $form_values = null  ): array {
        return [
            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->first_name_input_field( $form_values ) ) ),
//            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->last_name_input_field( $form_values ) ) ),
//            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->gender_input_field( $form_values ) ) ),
//            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->dob_input_field( $form_values ) ) ),
//            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->email_input_field( $form_values ) ) ),
//            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->phone_number_input_field( $form_values ) ) ),
//            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->nationality_input_field( $form_values ) ) ),
//            FormBuilder::get_form_component( 'textarea', $this->address_text_area_field( $form_values ) ),
//            FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->website_input_field( $form_values ) ) ),
        ];
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
