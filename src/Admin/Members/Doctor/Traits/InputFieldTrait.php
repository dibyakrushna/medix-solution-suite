<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

trait InputFieldTrait {

    private function build_input_field($attr = []): ?array {
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
}
