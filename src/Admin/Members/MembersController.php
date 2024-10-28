<?php

namespace MedixSolutionSuite\Admin\Members;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of MembersController
 *
 * @author dibya
 */
class MembersController {

//put your code here
    public function __construct() {
        
        echo " i am from admin mmmember ";
        add_action("admin_enqueue_scripts", [$this, "enque_admin_member_scripts"]);
    }
    public function enque_admin_member_scripts() {
        wp_register_style( 'custom_wp_mss_admin_css', plugin_dir_path(__FILE__)."/Assets/css/mss.admin.member.custom.style.css", false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_mss_admin_css' );
        
    }
    public function table_view(): string {
        
    }

    public function add(): void {
        
    }
}
