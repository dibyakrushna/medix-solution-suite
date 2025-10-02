<?php
if ( $args[ "display" ] instanceof WP_List_Table ) {
    $args[ "display" ]->prepare_items();
    $args[ "display" ]->display();
} else {
    echo $args[ "display" ];
}
// echo wp_kses($args["display"], wp_kses_allowed_html("post"));
?>



