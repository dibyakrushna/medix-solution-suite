<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay\Traits\DisplayHooks;

if ( !trait_exists( "AdminDisplayHooksTrait" ) ) {


    trait AdminDisplayHooksTrait {

        private function mss_admin_display_assests( $hook ) {
            // Only load on relevant admin pages
            if ( strpos( $hook, 'mss_members' ) === false ) {
                return;
            }
            $base_path = "src/Admin/AdminDisplay/Assests";

            $css_url = MSS_PLUGIN_URL . $base_path . '/css/display/mss-admin-display-style.css';
            $js_url = MSS_PLUGIN_URL . $base_path . '/js/display/mss.admin.display.script.js';

            $css_path = MSS_PLUGIN_PATH . $base_path . '/css/display/mss-admin-display-style.css';
            $js_path = MSS_PLUGIN_PATH . $base_path . '/js/display/mss.admin.display.script.js';

            $css_version = filemtime( $css_path ) ?? time();
            $js_version = filemtime( $js_path ) ?? time();

            wp_register_style(
                    'custom_mss_admin_display_css',
                    $css_url,
                    false, $css_version
            );
            wp_enqueue_style( 'custom_mss_admin_display_css' );

            wp_register_script(
                    "custom_mss_admin_display_script",
                    $js_url,
                    [ "jquery" ],
                    $js_version
            );
            wp_enqueue_script( "custom_mss_admin_display_script" );
        }
    }

}
