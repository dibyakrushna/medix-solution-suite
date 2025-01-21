<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;

/**
 * Description of InputField
 *
 * @author dibya
 */
class InputField implements FormComponentInterface {

    /**
     * @var string 
     * @since 1.0.0
     * * */
    private string $type = "";

    /**
     * @var string 
     * @since 1.0.0
     * * */
    private string $name = "";

    /**
     * @var string 
     * @since 1.0.0
     * * */
    private string $label = "";

    /**
     * @var string 
     * @since 1.0.0
     * * */
    public string $id = '';

    /**
     * @var array
     * @since 1.0.0
     * * */
    private array $classes = [];

    /**
     * @var array
     * @since 1.0.0
     * * */
    private array $extra_attr = [];

    /**
     * @var string 
     * @since 1.0.0
     * * */
    public string $header = '';

    /**
     * @var string 
     * @since 1.0.0
     * * */
    public string $description = '';

    /**
     * @var array
     * @since 1.0.0
     * * */
    private array $options = [];

    /**
     * @var boolean
     * @since 1.0.0
     * * */
    private bool $error = false;

    public function __construct( array $attr ) {
        $default_attr = [
            "type" => "text",
            "name" => "",
            "id" => "",
            "extra_attr" => [],
            "classes" => [],
            "label" => "",
            "header" => "",
            "options" => [],
            "error" => false,
            "description" => ""
        ];

        $attr = array_merge( $default_attr, $attr );

        $this->type = $attr[ 'type' ];
        $this->name = $attr[ 'name' ];
        $this->label = $attr[ 'label' ];
        $this->id = $attr[ 'id' ];
        $this->extra_attr = is_array( $attr[ 'extra_attr' ] ) ? $attr[ 'extra_attr' ] : [];
        $this->classes = $attr[ 'classes' ];
        $this->header = $attr[ 'header' ];
        $this->options = $attr[ 'options' ];
        $this->error = $attr[ "error" ];
        $this->description = $attr[ 'description' ];
    }

    public function render(): string {
        $class_attr = implode( " ", $this->classes );
        $extra_attr_str = null;
        if ( is_array( $this->extra_attr ) ) {
            foreach ( $this->extra_attr as $key => $value ) {
                $extra_attr_str .= " $key=$value";
            }
        }

        ob_start();
        ?>
        <?php if ( "radio" === $this->type ): ?>
            <?php foreach ( $this->options as $option_key => $option_value ) : ?>
                <input 
                    type="<?= esc_attr( $this->type ) ?>" 
                    name="<?= esc_attr( $option_value[ "name" ] ) ?>"
                    <?= esc_attr( $extra_attr_str ?? '' ) ?> 
                    id="<?= esc_attr( $option_value[ "id" ] ) ?>" 
                    class="<?= $option_value[ 'classes' ] ? esc_attr( implode( " ", $option_value[ 'classes' ] ) ) : "" ?>"
                    value ="<?= esc_attr( $option_value[ 'value' ] ) ?>"
                     <?php selected( $option_value['selected'], true ); ?>
                    />
                <label for="<?= esc_attr( $option_value[ "id" ] ) ?>">                   
                    <?php esc_html_e( $option_value[ 'label' ], MSS_TEXT_DOMAIN ) ?>
                </label>

            <?php endforeach; ?>
            <?php if ( isset( $this->description ) && !empty( trim( $this->description ) ) ): ?>
                <span class="description <?= $this->error ? 'error' : "" ?>">
                    <?php esc_html_e( $this->description, MSS_TEXT_DOMAIN ) ?>
                </span>
            <?php endif; ?>

        <?php else : ?>
            <input 
                type="<?= esc_attr( $this->type ) ?>" 
                name="<?= esc_attr( $this->name ) ?>"
                <?= esc_attr( $extra_attr_str ?? '' ) ?> 
                id="<?= esc_attr( $this->id ) ?>" 
                class="<?= esc_attr( $class_attr ) ?>"
                />
                <?php if ( !empty( trim( $this->description ) ) ) : ?>
                <span class="description <?= $this->error ? 'error' : "" ?>"> <?= esc_html__( $this->description, MSS_TEXT_DOMAIN ) ?> </span>
            <?php endif; ?>
        <?php endif; ?>


        <?php
        return ob_get_clean();
    }
}
