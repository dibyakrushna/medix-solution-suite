<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;

/**
 * Description of TextAreaField
 *
 * @author dibya
 */
class TextAreaField implements FormComponentInterface {

    /**
     * 
     * * */
    private $id = null;
    private $classes = [];
    private $label = null;
    public $header = null;
    private $name = null;
    private $extra_attr = [];
    private $value = null;

    public function __construct( array $attr ) {
        $default_attr = [
            "name" => "",
            "id" => "",
            "extra_attr" => [],
            "classes" => [],
            "label" => "",
            "header" => "",
            "value" => ""
        ];

        $attr = array_merge( $default_attr, $attr );

        $this->name = $attr[ 'name' ];
        $this->label = $attr[ 'label' ];
        $this->id = $attr[ 'id' ];
        $this->extra_attr = $attr[ 'extra_attr' ];
        $this->classes = $attr[ 'classes' ];
        $this->header = $attr[ 'header' ];
        $this->value = $attr[ 'value' ];
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
        <textarea 
            id="<?= esc_attr( $this->id ) ?>" 
            name="<?= esc_attr( $this->name ) ?>"  
            <?= count( $this->classes ) > 0 ? 'class="' . esc_attr( $class_attr ) . '"' : "" ?>
            <?= $extra_attr_str ? esc_attr( $extra_attr_str ) : "" ?>
            >
                <?= esc_html( $this->value ) ?>
        </textarea>
        <?php
        return ob_get_clean();
    }
}
