<div class="wrap hello">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'mss_admin_members_menu',
        'menu_class' => 'mss-admin-menu',
        'walker' => new \Walker_Nav_Menu(),
        'container' => 'nav',
    ));

    // echo  $args["display"]->table_view();

    echo wp_kses($args["display"]->table_view(), wp_kses_allowed_html("post"));
    ?>
</div>


