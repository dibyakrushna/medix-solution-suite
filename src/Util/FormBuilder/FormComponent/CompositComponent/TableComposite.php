<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\CompositComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\LabelableInterface;

/**
 * Description of TableComposite
 * @since 1.0.0
 * @author dibya
 */
class TableComposite implements FormComponentInterface {

    private $fields = [];
    public $header = null;
    private $id = null;
    private $classes = null;
    private $extra_attr = [];

    public function __construct( array $attrs ) {
        $default_attr = [
            "id" => "",
            "extra_attr" => [],
            "classes" => [],
            "header" => ""
        ];

        $attrs = array_merge( $default_attr, $attrs );

        //$this->id = $attrs['id'];
        $this->header = $attrs[ 'header' ];
        $this->classes = $attrs[ "classes" ];
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
                $extra_attr_str .= "$key=$value";
            }
        }
        ob_start();
        ?>
        <table 
            class="<?= esc_attr( $class_attr ) ?>"
            <?= esc_attr( $extra_attr_str ) ?>>
            <tbody>
                <?php foreach ( $this->fields as $key => $field ) : ?>
                    <tr>
                        <th>   
                            <?php if ( $field instanceof LabelableInterface ): ?>
                                <label for="<?= esc_attr( $field->getId() ) ?>">
                                    <?= esc_html( $field->getHeader() ) ?>
                                </label>
                            <?php endif; ?>
                        </th>
                        <td><?= $field->render() ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }
}
