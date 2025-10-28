<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin;

use MedixSolutionSuite\Admin\AdminDisplay\AdminDisplayController;
use MedixSolutionSuite\Admin\AdminDisplay\Helper\AdminMembersContext;
use MedixSolutionSuite\Admin\AdminDisplay\Factories\MSSAdminMembersFactoriesImpl;
use MedixSolutionSuite\Admin\AdminDisplay\AdminAjaxController;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\Service\ImageServiceImpl;
use WP_Error;
use MedixSolutionSuite\Mapper\ImageServiceToDTOMapper;
use MedixSolutionSuite\DTO\DoctorImageDTO;

/**
 * Description of Admin
 *
 * @author dibya
 */
class AdminMenu {

    private static ?self $instance = null;

    public function __construct( private AdminDisplayController $adminDisplayController ) {
        
    }

    /**
     * Admin Menu
     * * */
    #[ AdminMenus ]
    public function medixSolutionSuiteAdminMenus() {
        $page_title = __( "Medix Solution Suite", MSS_TEXT_DOMAIN );
        $menu_title = __( "Medix Solution Suite", MSS_TEXT_DOMAIN );
        $capability = "manage_options";
        $menu_slug = "medix_solution_suite";
        $callback = "__return_null";
        $icon_url = "dashicons-nametag";
        $position = 6;

        add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url, $position );
        add_submenu_page( $menu_slug, __( "Members", MSS_TEXT_DOMAIN ), __( "Members", MSS_TEXT_DOMAIN ), $capability, "mss_members", [ $this->adminDisplayController, "memberDisplay" ], 6.1 );
        remove_submenu_page( $menu_slug, $menu_slug );
    }

    /**
     * Used Singleton DP for 
     * 
     * * */
    public static function getInstance(): self {
        if ( null === self::$instance ) {
            $adminDipendecy = new AdminDisplayController(
                    new AdminMembersContext(
                            new MSSAdminMembersFactoriesImpl
                    ),
                    new AdminAjaxController(
                            request: new Request,
                            service: new ImageServiceImpl(
                                    new WP_Error,
                                    new ImageServiceToDTOMapper(
                                            new DoctorImageDTO
                                    )
                            )
                    )
            );
            self::$instance = new self( $adminDipendecy );
        }
        return self::$instance;
    }

    public function init() {
        register_nav_menu( 'mss_admin_members_menu', __( 'MSS Admin Members Menu', MSS_TEXT_DOMAIN ) );
        add_action( 'admin_menu', [ $this, 'medixSolutionSuiteAdminMenus' ] );
    }
}
