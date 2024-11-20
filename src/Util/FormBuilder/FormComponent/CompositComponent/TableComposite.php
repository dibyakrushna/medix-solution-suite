<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\CompositComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;

/**
 * Description of TableComposite
 *
 * @author dibya
 */
class TableComposite implements FormComponentInterface {

    private $fields = [];

    //put your code here
    public function add(FormComponentInterface $component) {
        $this->fields[] = $component;
    }

    public function render(): string {
        ob_start();
        ?>
        <table class="form-table">
            <tbody>
                <?php foreach ($this->fields as $key => $field) : ?>
                <tr>
                    <th><?= $field->header ?> </th>
                    <td><?=  $field->render()?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        return ob_get_clean();
    }
}
