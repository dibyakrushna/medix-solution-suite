<?php
declare (strict_types=1);
namespace MedixSolutionSuite\Util\FormBuilder;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;

/**
 *
 * @author dibya <<dibyakrishna@gmail.com>>
 * @since 1.0.0
 */
interface FormBuilderInreface {
    public static function get_form_component( string $componet_type, array $attrs ): FormComponentInterface ;
}
