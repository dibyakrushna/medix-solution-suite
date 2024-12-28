<?php
declare (strict_type=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\CompositComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;

/**
 * @package CompositComponent
 * @since  1.0.0
 * @author dibya
 */
class FormCompositComponent implements FormComponentInterface {

    private $fields = [];
    private $id = "";
    private $method = "";
    private $action = "";
    private $extra_attr = [];
    private $classes = [];

    public function __construct( array $attrs ) {
        $default_attr = [
            "id" => "",
            "method" => "",
            "action" => "",
            "extra_attr" => [],
            "classes" => [],
        ];

        $attrs = array_merge( $default_attr, $attrs );

        $this->id = $attrs[ 'id' ];
        $this->method = $attrs[ 'method' ];
        $this->classes = $attrs[ "classes" ];
        $this->action = $attrs[ "action" ];
        $this->extra_attr = $attrs[ 'extra_attr' ];
    }

    public function add( FormComponentInterface $component ) {
        $this->fields[] = $component;
    }

    public function render(): string {

        $class_attr = implode( " ", $this->classes );
        $extra_attr_str = null;
        if ( is_array( $this->extra_attr ) ) {
            foreach ( $this->extra_attr as $key => $value ) {
                $extra_attr_str .= "$key=\"$value\" ";
            }
        }

        ob_start();
        ?>
        <form 
            method="<?= esc_attr( $this->method ) ?>"
            id="<?= esc_attr( $this->id ) ?>"
            class="<?= esc_attr( $class_attr ) ?>"
            action="<?= esc_attr( $this->action ) ?>"
            <?= esc_attr( $extra_attr_str ) ?>>
                <?php wp_nonce_field(); ?>
                <?php foreach ( $this->fields as $key => $field ) : ?>
                <h1 class="wp-heading-inline">
                    <?php esc_html_e( $field->header, MSS_TEXT_DOMAIN ) ?>			
                </h1>
                <?= $field->render() ?>
            <?php endforeach; ?>
            <?= get_submit_button( __( "Submit", MSS_TEXT_DOMAIN ) ) ?>
        </form>
        <?php
        return ob_get_clean();
    }
}
