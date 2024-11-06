<div class="wrap">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'mss_admin_members_menu',
        'menu_class' => 'mss-admin-menu',
        'walker' => new \Walker_Nav_Menu(),
        'container' => 'nav',
    ));
    ?>
    <style>


        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-height: 70vh;
           
            box-sizing: border-box;
        }

        

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="container">
        <div class="content-wraper">
            <h1>404 - Page Not Found</h1>
            <p>The page you're looking for doesn't exist or has been moved.</p>
        </div>
    </div>
</div>

