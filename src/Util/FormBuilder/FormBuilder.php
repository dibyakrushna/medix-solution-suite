<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Util\FormBuilder;

use MedixSolutionSuite\Util\FormBuilder\FormBuilderInreface;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent\InputField;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent\TextAreaField;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\CompositComponent\TableComposite;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\CompositComponent\FormCompositComponent;
use MedixSolutionSuite\Enums\FormComponentEnum;

/**
 * Factory class of form builder
 *
 * @author dibya<dibyakrishna@gmail.com>
 * @package FormBuilder
 * @since 1.0.0
 */
class FormBuilder implements FormBuilderInreface {

    /**
     * Creating Form field
     * @param string $componet_type form component type
     * @param array $attrs All  attributes of input field
     * @return FormComponentInterface form component
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * * */
    public static function get_form_component( string $componet_type, array $attrs ):  FormComponentInterface {

        $form_component = match ( $componet_type ) {
            FormComponentEnum::INPUT->value => new InputField( $attrs ),
            FormComponentEnum::TABLE->value => new TableComposite( $attrs ),
            FormComponentEnum::FORM->value => new FormCompositComponent( $attrs ),
            FormComponentEnum::TEXTAREA->value => new TextAreaField( $attrs ),
            default => throw new \ErrorException( "Form Type Not Matched" ),
        };
        return $form_component;
    }
}
