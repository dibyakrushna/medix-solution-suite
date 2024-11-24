<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\FormBuilder\FormBuilder;
use MedixSolutionSuite\Admin\Members\Doctor\Traits\InputFieldTrait;

trait BuildFormComponentTrait {

    use InputFieldTrait;

    private function build_component( array $value = [] ): ?string {
        $default_values = [
            "mss_admin_doctor_first_name" => null,
            "mss_admin_doctor_last_name" => null,
            "mss_admin_doctor_gender_female" => null,
            "mss_admin_doctor_gender_male" => null,
            "mss_admin_doctor_gender_other" => null,
            "mss_admin_doctor_dob" => null,
            "mss_admin_doctor_phone_num" => null,
            "mss_admin_doctor_email" => null,
        ];
        $form_values = array_merge( $default_values, $value );

        $first_name_input_component = FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->first_name_input_field( $form_values ) ) );
        $last_name_input_component = FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->last_name_input_field( $form_values ) ) );
        $gender_input_component = FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->gender_input_field( $form_values ) ) );
        $dob_input_component = FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->dob_input_field( $form_values ) ) );
        $email_input_component = FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->email_input_field( $form_values ) ) );
        $phone_number_input_component = FormBuilder::get_form_component( 'input', $this->build_input_attr( $this->phone_number_input_field( $form_values ) ) );

        $personal_table_component = FormBuilder::get_form_component( 'table', $this->build_table_attr() );
        $form_componet = FormBuilder::get_form_component( 'form', $this->build_form_attr() );

        $personal_table_component->add( $first_name_input_component );
        $personal_table_component->add( $last_name_input_component );
        $personal_table_component->add( $gender_input_component );
        $personal_table_component->add( $dob_input_component );
        $personal_table_component->add( $email_input_component );
        $personal_table_component->add( $phone_number_input_component );

        $form_componet->add( $personal_table_component );

        return $form_componet->render(); 
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
