<?php
?>
<div class="wrap">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'mss_admin_members_menu',
        'menu_class' => 'mss-admin-menu',
        'walker' => new Walker_Nav_Menu(),
        'container' => 'nav',
    ) );
    