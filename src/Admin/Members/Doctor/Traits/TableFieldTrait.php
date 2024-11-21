<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

trait TableFieldTrait {

    private function build_table_component($attr = []): ?array {
        $default_attr = [
           "id" => "",
            "extra_attr" => ["role" => "presentation"],
            "classes" => ["form-table"],
            "header" => "Personal Information"
        ];
        $attr = array_merge($default_attr, $attr);
        return $attr;
    }
}
