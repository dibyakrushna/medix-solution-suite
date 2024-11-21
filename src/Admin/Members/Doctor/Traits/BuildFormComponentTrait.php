<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\Util\FormBuilder\FormBuilder;

trait BuildFormComponentTrait {

    private function build_component(): ?string {
        $first_name_input_component = FormBuilder::get_form_component('input', $this->build_input_attr());
        $personal_table_component = FormBuilder::get_form_component('table', $this->build_table_attr());
        $form_componet = FormBuilder::get_form_component('form', $this->build_form_attr());
        
        $personal_table_component->add($first_name_input_component);
        $form_componet->add($personal_table_component);
        return $form_componet->render();
    }

    private function build_input_attr($attr = []): ?array {
        $default_attr = [
            "type" => "text",
            "name" => "mss_admin_doctor_first_name",
            "id" => "mss_admin_doctor_first_name",
            "extra_attr" => [],
            "classes" => ["regular-text"],
            "label" => "First name of doctor",
            "header" => "First Name"
        ];
        $attr = array_merge($default_attr, $attr);
        return $attr;
    }

    private function build_table_attr($attr = []): ?array {
        $default_attr = [
            "id" => "",
            "extra_attr" => ["role" => "presentation"],
            "classes" => ["form-table"],
            "header" => "Personal Information"
        ];
        $attr = array_merge($default_attr, $attr);
        return $attr;
    }

    private function build_form_attr($attrs = []): ?array {

        $default_attr = [
            "id" => "mss-doctor-form",
            "method" => "POST",
            "action" => esc_url(admin_url("admin.php") . "?page=mss_members&controller=doctor&action=save") ,
            "extra_attr" => [],
            "classes" => ["mss-admin-doctor"],
        ];

        $attrs = array_merge($default_attr, $attrs);
        return $attrs;
    }
}
