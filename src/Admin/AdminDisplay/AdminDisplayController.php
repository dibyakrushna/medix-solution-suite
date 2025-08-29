<?php
declare (strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay;

use MedixSolutionSuite\Admin\AdminDisplay\Helper\AdminMembersContext;
use RuntimeException;
use Throwable;

/**
 * Description of AdminDisplayController
 *
 * @author dibya
 */
class AdminDisplayController {

    //put your code here
    public function __construct( private AdminMembersContext $adminMembersContext ) {
        add_action( "admin_enqueue_scripts", [ $this, "mss_display_admin_assets" ] );
        $this->register_mss_member_munu();
        add_action( 'init', [ $this, 'create_mss_member_role' ] );
    }

    public function create_mss_member_role() {
        if ( !get_role( 'mss_member_doctor' ) ) {
            add_role(
                    'mss_member_doctor',
                    __( 'Doctor', MSS_TEXT_DOMAIN ),
                    [
                        'read' => true, // Allow reading
                        'edit_posts' => false, // Prevent editing posts
                        'delete_posts' => false, // Prevent deleting posts
                    ]
            );
        }
    }

    public function mss_display_admin_assets() {
        wp_register_style( 'custom_mss_admin_display_css', plugin_dir_url( __FILE__ ) . '/Assests/css/mss-admin-display-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_mss_admin_display_css' );
        global $_wp_admin_css_colors;
        $color = get_user_meta( get_current_user_id(), 'admin_color', true );
        $colors = $_wp_admin_css_colors[ $color ];

//        $primary_color = $colors->colors[0];
//        $secondary_color = $colors->colors[1];
//        $first_active_hover = $colors->colors[3];
//        $data = ":root {
//            --mss-member-nav-bar-primary-color: {$primary_color};
//            --mss-member-nav-bar-secondary-color: {$secondary_color};
//            --mss-member-nav-bar-first-active-hover:{$first_active_hover}
//        }";
//        
//
//        wp_add_inline_style("custom_mss_admin_display_css", $data);
    }

    public function memberDisplay() {

        try {
            $display = $this->adminMembersContext->get_context();
            $template_view = sanitize_text_field( filter_input( INPUT_GET, "action" ) );
            if ( method_exists( $display, $template_view ) ) {
                $view = call_user_func( [ $display, $template_view ] );
                $this->load_template_part( "admin-members-display-tmpl", [ "display" => $view ] );
            } else {
                throw new RuntimeException( __( "No method found", MSS_TEXT_DOMAIN ), 404 );
            }
        } catch ( Throwable $exc ) {
            if ( $exc->getCode() === 404 ) {
                http_response_code( 404 );
                $this->load_template_part( "admin-members-display-404-tmpl" );
            } else {
                http_response_code( 500 );
                $this->load_template_part( "admin-members-display-error-tmpl", [
                    "message" => $exc->getMessage(),
                ] );
            }
        }
    }

    function register_mss_member_munu() {
        $menuName = 'mss_admin_members_menu';
        $menuExists = wp_get_nav_menu_object( $menuName );

        // If the menu doesn't exist, create it.
        if ( !$menuExists ) {
            $menuId = wp_create_nav_menu( $menuName );
            $baseUrl = admin_url( 'admin.php' );

            $home_url = add_query_arg( array( 'page' => 'mss_members', 'controller' => 'home', 'action' => 'view' ), $baseUrl );
            $home_url_id = wp_update_nav_menu_item( $menuId, 0, array(
                'menu-item-title' => __( 'Home', MSS_TEXT_DOMAIN ),
                'menu-item-classes' => 'home',
                'menu-item-url' => $home_url,
                'menu-item-status' => 'publish'
                    ) );

            // Create the main "Doctor" menu item
            $doctorUrl = add_query_arg( array( 'page' => 'mss_members', 'controller' => 'doctor', 'action' => 'view' ), $baseUrl );
            $doctorItemId = wp_update_nav_menu_item( $menuId, 0, array(
                'menu-item-title' => __( 'Doctor', MSS_TEXT_DOMAIN ),
                'menu-item-classes' => 'doctor',
                'menu-item-url' => $doctorUrl,
                'menu-item-status' => 'publish'
                    ) );

            // Add child items under "Doctor"
            $addDoctorUrl = add_query_arg( array( 'page' => 'mss_members', 'controller' => 'doctor', 'action' => 'add' ), $baseUrl );
            wp_update_nav_menu_item( $menuId, 0, array(
                'menu-item-title' => __( 'Add Doctor', MSS_TEXT_DOMAIN ),
                'menu-item-url' => $addDoctorUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $doctorItemId
            ) );

            $viewDoctorUrl = add_query_arg( array( 'page' => 'mss_members', 'controller' => 'doctor', 'action' => 'view' ), $baseUrl );
            wp_update_nav_menu_item( $menuId, 0, array(
                'menu-item-title' => __( 'View Doctor', MSS_TEXT_DOMAIN ),
                'menu-item-url' => $viewDoctorUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $doctorItemId
            ) );

            // Create the main "Patient" menu item
            $patientUrl = add_query_arg( array( 'page' => 'mss_members', 'controller' => 'patient', 'action' => 'view' ), $baseUrl );
            $patientItemId = wp_update_nav_menu_item( $menuId, 0, array(
                'menu-item-title' => __( 'Patient', MSS_TEXT_DOMAIN ),
                'menu-item-classes' => 'patient',
                'menu-item-url' => $patientUrl,
                'menu-item-status' => 'publish'
                    ) );

            // Add child items under "Patient"
            $addPatientUrl = add_query_arg( array( 'page' => 'mss_members', 'controller' => 'patient', 'action' => 'add' ), $baseUrl );
            wp_update_nav_menu_item( $menuId, 0, array(
                'menu-item-title' => __( 'Add Patient', MSS_TEXT_DOMAIN ),
                'menu-item-url' => $addPatientUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $patientItemId
            ) );

            $viewPatientUrl = add_query_arg( array( 'page' => 'mss_members', 'controller' => 'patient', 'action' => 'view' ), $baseUrl );
            wp_update_nav_menu_item( $menuId, 0, array(
                'menu-item-title' => __( 'View Patient', MSS_TEXT_DOMAIN ),
                'menu-item-url' => $viewPatientUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $patientItemId
            ) );

            // If the menu exists, ensure it's assigned to the desired location
            $menuLocations = get_theme_mod( 'nav_menu_locations', array() );

            // Check if the menu location is already set
            if ( !isset( $menuLocations[ 'mss_admin_members_menu' ] ) ) {
                $menuLocations[ 'mss_admin_members_menu' ] = $menuExists->term_id;
                set_theme_mod( 'nav_menu_locations', $menuLocations );
            }
        } else {
            // If the menu exists, ensure it's assigned to the desired location
            $menuLocations = get_theme_mod( 'nav_menu_locations', array() );

            // Check if the menu location is already set
            if ( !isset( $menuLocations[ 'mss_admin_members_menu' ] ) ) {
                $menuLocations[ 'mss_admin_members_menu' ] = $menuExists->term_id;
                set_theme_mod( 'nav_menu_locations', $menuLocations );
            }
        }
    }

    /**
     * Getting Template path
     * 
     * * */
    private function load_template_part( string $fileName, array $args = [] ) {
        try {
            $nav_tmpl_path = plugin_dir_path( __FILE__ ) . "/Templates/admin-members-nav-tmpl.php";
            load_template( $nav_tmpl_path, true, $args );
            $file_path = plugin_dir_path( __FILE__ ) . "/Templates/{$fileName}.php";
            if ( file_exists( $file_path ) ) {
                load_template( $file_path, true, $args );
            } else {
                throw new \ErrorException( __( "No template found", MSS_TEXT_DOMAIN ) );
            }
            echo '</div>'; 
        } catch ( Throwable $exc ) {
            ?>
            <div class="wrap"> <?= $exc->getMessage() ?>      </div>

            <?php
        }
    }
}
