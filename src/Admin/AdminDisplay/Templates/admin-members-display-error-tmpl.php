
<h1> <?= esc_html__( "There is error", MSS_TEXT_DOMAIN ) ?></h1>
<p>
    <?= esc_html( $args[ "message" ] ) ?> 
    <br>
    <?= esc_html( $args[ "file" ] ) ?>
    <?= esc_html( $args[ "line" ] ) ?>


</p>