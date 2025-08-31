<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\LabelableInterface;

/**
 * Description of TextAreaField
 *
 * @author dibya
 */
class TextAreaField implements FormComponentInterface, LabelableInterface {

    /**
     * @var String Description
     * * */
    private string $id = '';

    /**
     * @var array 
     * @since 1.0.0
     * * */
    private array $classes = [];

    /**
     * @var String
     * @since 1.0.0
     * * */
    private string $label = '';

    /**
     * @var String
     * @since 1.0.0
     * * */
    private string $header = '';

    /**
     * @var String
     * @since 1.0.0
     * * */
    private string $name = '';

    /**
     * @var array 
     * @since 1.0.0
     * * */
    private array $extra_attr = [];

    /**
     * @var String
     * @since 1.0.0
     * * */
    private string $value = '';

    /**
     * @var String
     * @since 1.0.0
     * * */
    private string $description = "";

    /**
     * @var boolean
     * @since 1.0.0
     * * */
    private bool $error = false;

    public function __construct( array $attr ) {
        $default_attr = [
            "name" => "",
            "id" => "",
            "extra_attr" => [],
            "classes" => [],
            "label" => "",
            "header" => "",
            "value" => "",
            "description" => "",
            "error" => false
        ];

        $attr = array_merge( $default_attr, $attr );

        $this->name = $attr[ 'name' ];
        $this->label = $attr[ 'label' ];
        $this->id = $attr[ 'id' ];
        $this->extra_attr = $attr[ 'extra_attr' ];
        $this->classes = $attr[ 'classes' ];
        $this->header = $attr[ 'header' ];
        $this->value = $attr[ 'value' ];
        $this->description = $attr[ 'description' ];
        $this->error = $attr[ 'error' ];
    }

    public function render(): string {

        $class_attr = implode( " ", $this->classes );
        $extra_attr_str = null;
        if ( is_array( $this->extra_attr ) ) {
            foreach ( $this->extra_attr as $key => $value ) {
                $extra_attr_str .= sprintf( ' %s=%s', esc_attr( $key ), esc_attr( $value ) );
            }
        }
        ob_start();
        ?>
        <textarea 
            id="<?= esc_attr( $this->id ) ?>" 
            name="<?= esc_attr( $this->name ) ?>"  
            <?= count( $this->classes ) > 0 ? 'class="' . esc_attr( $class_attr ) . '"' : "" ?>
            <?= $extra_attr_str ? esc_attr( $extra_attr_str ) : "" ?>
            >
                <?= esc_html( $this->value ) ?>
        </textarea>
        <?php if ( !empty( trim( $this->description ) ) ) : ?>
            <p class="description <?= $this->error ? 'error' : "" ?>"> <?= esc_html__( $this->description, MSS_TEXT_DOMAIN ) ?> </p>
        <?php endif; ?>
        <?php
        return ob_get_clean();
    }

    public function getHeader(): string {
        return $this->header;
    }

    public function getId(): string {
        return $this->id;
    }
}
