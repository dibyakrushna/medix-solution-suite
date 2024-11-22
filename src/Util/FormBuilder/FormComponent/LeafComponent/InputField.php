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
     * 
     * * */
    private $type = null;

    /**
     * 
     * * */
    private $name = null;

    /**
     * 
     * * */
    private $label = null;

    /**
     * 
     * * */
    private $id = null;

    /*
     * 
     * * */
    private $classes = [];

    /**

     * 
     *      */
    private $extra_attr = [];
    public $header = null;
    private $options = [];

    public function __construct(array $attr) {
        $default_attr = [
            "type" => "text",
            "name" => "",
            "id" => "",
            "extra_attr" => [],
            "classes" => [],
            "label" => "",
            "header" => "",
            "options" => []
        ];

        $attr = array_merge($default_attr, $attr);

        $this->type = $attr['type'];
        $this->name = $attr['name'];
        $this->label = $attr['label'];
        $this->id = $attr['id'];
        $this->extra_attr = $attr['extra_attr'];
        $this->classes = $attr['classes'];
        $this->header = $attr['header'];
        $this->options = $attr['options'];
    }

    public function render(): string {
        $class_attr = implode(" ", $this->classes);
        $extra_attr_str = null;
        if (is_array($this->extra_attr)) {
            foreach ($this->extra_attr as $key => $value) {
                $extra_attr_str .= " $key=$value";
            }
        }

        ob_start();
        ?>
        <?php if ("radio" === $this->type): ?>
            <?php foreach ($this->options as $option_key => $option_value) : ?>
                <label  for="<?= esc_attr($option_value["id"]) ?>">
                    <input 
                        type="<?= esc_attr($this->type) ?>" 
                        name="<?= esc_attr($option_value["name"]) ?>"
                        <?= esc_attr($extra_attr_str ?? '') ?> 
                        id="<?= esc_attr($option_value["id"]) ?>" 
                        class="<?= $option_value['classes'] ? esc_attr( implode(" ", $option_value['classes']) ):"" ?>"
                        value ="<?= esc_attr($option_value['value']) ?>"
                        >
                        <?php esc_html_e($option_value['label'], MSS_TEXT_DOMAIN) ?>
                </label>
            <?php endforeach; ?>

        <?php else : ?>
            <label  for="<?= esc_attr($this->id) ?>">
                <input 
                    type="<?= esc_attr($this->type) ?>" 
                    name="<?= esc_attr($this->name) ?>"
                    <?= esc_attr($extra_attr_str ?? '') ?> 
                    id="<?= esc_attr($this->id) ?>" 
                    class="<?= esc_attr($class_attr) ?>"
                    >
                    <?php esc_html_e($this->label, MSS_TEXT_DOMAIN) ?>
            </label>

        <?php endif; ?>


        <?php
        return ob_get_clean();
    }
}
