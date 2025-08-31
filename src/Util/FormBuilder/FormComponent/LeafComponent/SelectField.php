<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\LabelableInterface;


/**
 * Select Field Component
 *
 * @author dibya
 */
class SelectField implements FormComponentInterface, LabelableInterface {

    /**
     * @var string 
     * @since 1.0.0
     * * */
    private string $name = "";

    /**
     * @var string 
     * @since 1.0.0
     * * */
    private string $id = "";
    
     /**
     * @var String
     * @since 1.0.0
     * * */
    private string $header = '';

    /**
     * @var string 
     * @since 1.0.0
     * * */
    private string $selected = "";

    /**
     * @var array
     * @since 1.0.0
     * * */
    private array $extra_attr = [];

    /**
     * @var array
     * @since 1.0.0
     * * */
    private array $classes = [];

    /**
     * @var array
     * @since 1.0.0
     * * */
    private array $options = [];

    /**
     * @var array
     * @since 1.0.0
     * * */
    private array $optgroup = [];

    /**
     * @var boolean
     * @since 1.0.0
     * * */
    private bool $error = false;

    /**
     * @var string 
     * @since 1.0.0
     * * */
    private string $description = "";

    public function __construct( array $attr ) {
        $default_attr = [
            "name" => "",
            "id" => "",
            "extra_attr" => [],
            "classes" => [],
            "options" => [],
            "optgroup" => [],
            "error" => false,
            "description" => "",
            "selected" => "",
            "header" => "",
        ];

        $attr = array_merge( $default_attr, $attr );
       

        $this->name = $attr[ 'name' ];
        $this->id = $attr[ 'id' ];
        $this->classes = $attr[ 'classes' ];
        $this->extra_attr = $attr[ 'extra_attr' ];
        $this->optgroup = $attr[ 'optgroup' ];
        $this->options = $attr[ 'options' ];
        $this->selected = $attr[ "selected" ];
        $this->error = $attr[ "error" ];
        $this->description = $attr[ "description" ];
        $this->header = $attr[ 'header' ];
    }

    public function render(): string {
        $class_attr = implode( " ", $this->classes );
        $extra_attr_str = "";

        if ( is_array( $this->extra_attr ) ) {
            foreach ( $this->extra_attr as $key => $value ) {
                $extra_attr_str .= sprintf( ' %s=%s', esc_attr( $key ), esc_attr( $value ) );
            }
        }

        ob_start();
        ?>
        <select 
            name="<?= esc_attr( $this->name ) ?>" 
            id="<?= esc_attr( $this->id ) ?>" 
            <?= $extra_attr_str ?> 
            class="<?= esc_attr( $class_attr ) ?>"
            >
                <?php if ( !empty( $this->optgroup ) ) : ?>
                    <?php
                    foreach ( $this->optgroup as $optgroup ) :

                        $label = isset( $optgroup[ "optgroup_label" ] ) ? $optgroup[ "optgroup_label" ] : "";
                        $options = isset( $optgroup[ "options" ] ) && is_array( $optgroup[ "options" ] ) ? $optgroup[ "options" ] : [];
                        ?>
                        <?php if ( !empty( $label ) && !empty( $options ) ) : ?>
                        <optgroup label="<?= esc_attr__( $label, MSS_TEXT_DOMAIN ) ?>">
                                <?php foreach ( $options as $optgrp_option_key => $optgrp_option_value ) : ?>
                                <option value="<?= esc_attr( $optgrp_option_key ) ?>" <?= selected( $this->selected, $optgrp_option_key, false ) ?>>
                                <?= esc_html( $optgrp_option_value ) ?>
                                </option>
                        <?php endforeach; ?>
                        </optgroup>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ( !empty( $this->options ) ) : ?>
                    <?php foreach ( $this->options as $option_key => $option_value ) : ?>
                    <option value="<?= esc_attr( $option_key ) ?>" <?= selected( $this->selected, $option_key, false ) ?>>
                    <?= esc_html__( $option_value, MSS_TEXT_DOMAIN ) ?>
                    </option>
                <?php endforeach; ?>
        <?php endif; ?>
        </select>

            <?php if ( !empty( trim( $this->description ) ) ) : ?>
            <span class="description <?= $this->error ? 'error' : "" ?>">
            <?= esc_html__( $this->description, MSS_TEXT_DOMAIN ) ?>
            </span>
        <?php endif; ?>
        <?php
        return ob_get_clean();
    }
   

    public function getHeader(): string {
       return  $this->header;
    }

    public function getId(): string {
         return $this->id;
    }
}
