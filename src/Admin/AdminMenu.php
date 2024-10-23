<?php
declare(strict_types=1);

namespace MedixSolutionSuite\Admin;

use MedixSolutionSuite\Admin\Doctor\DoctorTable;


/**
 * Description of Admin
 *
 * @author dibya
 */
class AdminMenu {
    
    private static ?self $instance = null;
    private ?DoctorTable $doctorTable = null;

    public function __construct(DoctorTable $doctorTable, ) {
        echo "Hello";
        $this->doctorTable = $doctorTable;
    }
    /**
     * Admin Menu
     * **/
    #[AdminMenus]
    public function medixSolutionSuiteAdminMenus() {
        $page_title = __("Medix Solution Suite", MSS_TEXT_DOMAIN);
        $menu_title = __("Medix Heros", MSS_TEXT_DOMAIN);
        $capability ="manage_options";
        $menu_slug = "medix_solution_suite";
        $callback = [$this->doctorTable, "mss_doctor" ];
        $icon_url = "dashicons-nametag";
        $position = 6 ;
        add_menu_page($page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url, $position);
    }

    /**
     * Used Singleton DP for 
     * 
     * * */
   #[Singleton]
    public static function getInstance(): self {
        if (null === self::$instance) {
            self::$instance = new self(new DoctorTable(),);
        }
        return self::$instance;
    }

    public function init() {
        add_action('admin_menu', [$this, 'medixSolutionSuiteAdminMenus']);
    }
}
