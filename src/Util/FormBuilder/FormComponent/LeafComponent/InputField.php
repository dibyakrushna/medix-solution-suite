<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Util\FormBuilder\FormComponent\LeafComponent;

use MedixSolutionSuite\Util\FormBuilder\FormComponent\FormComponentInterface;
use MedixSolutionSuite\Util\FormBuilder\FormComponent\LabelableInterface;

/**
 * Description of InputField
 *
 * @author dibya
 */
class InputField implements FormComponentInterface, LabelableInterface {

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
    private string $id = '';

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
    private string $header = '';

    /**
     * @var string 
     * @since 1.0.0
     * * */
    public string $description = '';

    /**
     * @var string 
     * @since 1.0.0
     * * */
    public string $value = '';

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

    /**
     * @var string 
     * @since 1.0.0
     * * */
    public string $files_url;

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
            "description" => "",
            "value" => "",
            "files_url" => ""
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
        $this->value = $attr[ "value" ];
        $this->files_url = $attr[ "files_url" ];
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
        <?php if ( "radio" === $this->type || "checkbox" === $this->type ): ?>
            <?php foreach ( $this->options as $option_key => $option_value ) : ?>

                <input 
                    type="<?= esc_attr( $this->type ) ?>" 
                    name="<?= esc_attr( $option_value[ "name" ] ) ?>"
                    <?= esc_attr( $extra_attr_str ?? '' ) ?> 
                    id="<?= esc_attr( $option_value[ "id" ] ) ?>" 
                    class="<?= $option_value[ 'classes' ] ? esc_attr( sanitize_html_class( implode( " ", $option_value[ 'classes' ] ) ) ) : "" ?>"
                    value ="<?= esc_attr( $option_value[ 'value' ] ) ?>"
                    <?php checked( $option_value[ 'selected' ], $option_value[ 'value' ] ); ?>
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
                class="<?= esc_attr( sanitize_html_class( $class_attr ) ) ?>"
                value="<?= esc_attr( $this->value ) ?>" 
                />
                <?php if ( !empty( trim( $this->description ) ) ) : ?>
                <span class="description <?= $this->error ? 'error' : "" ?>">
                    <?= esc_html__( $this->description, MSS_TEXT_DOMAIN ) ?>
                </span>
            <?php endif; ?>
            <?php if ( "file" === $this->type ): ?>
                <p class="progress-wraper" style="display: none">
                    <progress id="mss_upload_progress_<?= esc_attr( $this->id ) ?>" value="0" max="100"  class="<?= esc_attr( sanitize_html_class( $class_attr ) ) ?>">
                    </progress>
                    <span class=""></span>
                </p>
            <?php endif; ?>
            <?php if ( "file" === $this->type ): ?>
                <?php if ( !empty( $this->files_url ) ): ?>
                    <?php
                    $file_data = json_decode( stripslashes( $this->files_url ) );
                    ?>
                    <?php if ( $file_data && is_array( $file_data ) && !empty( $file_data ) ): ?>
                        <p class="mss-files-wraper" >
                            <span class="mss-files-item">
                                <?php foreach ( $file_data as $data ) : ?>
                                    <?php if ( str_contains( $data?->type, 'image' ) ) : ?>
                                        <img src="<?= esc_url_raw( $data?->file_url ) ?>" alt="<?= esc_attr__( $data?->file_name ) ?>"/> 
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </span>
                        </p>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="mss-files-wraper" style="display: none">
                        <span class="mss-files-item"></span>
                    </p>
                <?php endif; ?>
            <?php endif; ?>
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
