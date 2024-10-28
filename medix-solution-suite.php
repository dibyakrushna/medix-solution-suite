<?php

use MedixSolutionSuite\Admin\AdminMenu;
use MedixSolutionSuite\Admin\Doctor\AdminDoctorController;
use MedixSolutionSuite\Admin\Doctor\AdminDoctorTable;

/**
 * Plugin Name: Medix Solution Suite
 * Description: Medix Solution Suite is a powerful, all-encompassing WordPress plugin designed to streamline and simplify healthcare management. Built with the modern medical facility in mind, this comprehensive suite offers everything healthcare providers need to manage patients, staff, appointments, billing, and more—directly from your WordPress dashboard.
 * 
 * * */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
define("MSS_TEXT_DOMAIN", "medix_solution_suite");

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';


add_action("init", function () {
    if (!class_exists('WP_List_Table')) {
        
        require_once( ABSPATH . 'wp-admin/includes/class-wp-screen.php' ); //added
        require_once( ABSPATH . 'wp-admin/includes/screen.php' ); //added
        require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
        require_once( ABSPATH . 'wp-admin/includes/template.php' );
    }

    AdminMenu::getInstance()?->init();
});

