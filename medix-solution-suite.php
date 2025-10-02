<?php

use MedixSolutionSuite\Admin\AdminMenu;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
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

add_action("plugins_loaded", function () {
    AdminMenu::getInstance()?->init();
});

