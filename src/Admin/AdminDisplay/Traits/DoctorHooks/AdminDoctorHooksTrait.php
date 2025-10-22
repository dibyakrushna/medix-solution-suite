<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay\Traits\DoctorHooks;

use MedixSolutionSuite\Admin\AdminDisplay\AdminAjaxController;

if ( !trait_exists( "AdminDoctorHooksTrait" ) ) {

    trait AdminDoctorHooksTrait {

        /**
         * Enqueue admin assets for doctor management
         * @since 1.0.0
         */
        private function mss_doctor_admin_assets( $hook ): void {
            // Only load on relevant admin pages
            if ( strpos( $hook, 'mss_members' ) === false ) {
                return;
            }
            $controller = filter_input( INPUT_GET, "controller" );
            if ( "doctor" !== sanitize_text_field( $controller ) ) {
                return;
            }
            $base_path = "src/Admin/AdminDisplay/Assests";

            $css_url = MSS_PLUGIN_URL . $base_path . '/css/doctor/mss.admin.doctor.style.css';
            $js_url = MSS_PLUGIN_URL . $base_path . '/js/doctor/mss.admin.doctor.script.js';

            $css_path = MSS_PLUGIN_PATH . $base_path . '/css/doctor/mss.admin.doctor.style.css';
            $js_path = MSS_PLUGIN_PATH . $base_path . '/js/doctor/mss.admin.doctor.script.js';

            $css_version = filemtime( $css_path ) ?? time();
            $js_version = filemtime( $js_path ) ?? time();

            wp_register_style(
                    'custom_mss_admin_doctor_css',
                    $css_url,
                    ['wp-jquery-ui-dialog'],
                    $css_version
            );
            wp_enqueue_style( 'custom_mss_admin_doctor_css' );

            wp_register_script(
                    "custom_mss_admin_doctor_script",
                    $js_url,
                    [ "jquery", 'jquery-ui-dialog' ],
                    $js_version,
                    true
            );
            wp_enqueue_script( "custom_mss_admin_doctor_script" );
            wp_localize_script(
                    "custom_mss_admin_doctor_script",
                    "mss_admin_doc_script",
                    [
                        "wp_ajax_nonce" => wp_create_nonce( "mss_admin_file_upload" ),
                    ]
            );
        }

        /**
         * Ajax hook
         * * */
        private function mss_doctor_ajax( AdminAjaxController $admin_doc_ajax ) {
            add_action( "wp_ajax_admin_doctor_profile_upload", [ $admin_doc_ajax, "upload_file" ] );
            add_action( "wp_ajax_nopriv_admin_doctor_profile_upload", [ $admin_doc_ajax, "upload_file" ] );
        }
    }

}