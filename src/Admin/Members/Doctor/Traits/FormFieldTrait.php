<?php
declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

trait FormFieldTrait {

    private function build_form_component_dibya($attrs = []): ?array {

        $default_attr = [
            "id" => "",
            "method" => "",
            "action" => "",
            "extra_attr" => [],
            "classes" => [],
        ];

        $attrs = array_merge($default_attr, $attrs);
        return $attrs;
    }
}
