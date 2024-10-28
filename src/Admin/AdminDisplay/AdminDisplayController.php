<?php

namespace MedixSolutionSuite\Admin\AdminDisplay;

use MedixSolutionSuite\Admin\AdminDisplay\Helper\AdminMembersContext;

/**
 * Description of AdminDisplayController
 *
 * @author dibya
 */
class AdminDisplayController {

    //put your code here
    public function __construct(private AdminMembersContext $adminMembersContext) {
        
    }

    public function memberDisplay() {

        $menuName = 'mss_admin_members_menu';
        $menuExists = wp_get_nav_menu_object($menuName);

        // If the menu doesn't exist, create it.
        if (!$menuExists) {
            $menuId = wp_create_nav_menu($menuName);
            $baseUrl = admin_url('admin.php');

            // Create the main "Doctor" menu item
            $doctorUrl = add_query_arg(array('page' => 'mss_members', 'member' => 'doctor', 'action' => 'view'), $baseUrl);
            $doctorItemId = wp_update_nav_menu_item($menuId, 0, array(
                'menu-item-title' => __('Doctor', MSS_TEXT_DOMAIN),
                'menu-item-classes' => 'doctor',
                'menu-item-url' => $doctorUrl,
                'menu-item-status' => 'publish'
            ));

            // Add child items under "Doctor"
            $addDoctorUrl = add_query_arg(array('page' => 'mss_members', 'member' => 'doctor', 'action' => 'add'), $baseUrl);
            wp_update_nav_menu_item($menuId, 0, array(
                'menu-item-title' => __('Add Doctor', MSS_TEXT_DOMAIN),
                'menu-item-url' => $addDoctorUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $doctorItemId
            ));

            $viewDoctorUrl = add_query_arg(array('page' => 'mss_members', 'member' => 'doctor', 'action' => 'view'), $baseUrl);
            wp_update_nav_menu_item($menuId, 0, array(
                'menu-item-title' => __('View Doctor', MSS_TEXT_DOMAIN),
                'menu-item-url' => $viewDoctorUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $doctorItemId
            ));

            // Create the main "Patient" menu item
            $patientUrl = add_query_arg(array('page' => 'mss_members', 'member' => 'patient', 'action' => 'view'), $baseUrl);
            $patientItemId = wp_update_nav_menu_item($menuId, 0, array(
                'menu-item-title' => __('Patient', MSS_TEXT_DOMAIN),
                'menu-item-classes' => 'patient',
                'menu-item-url' => $patientUrl,
                'menu-item-status' => 'publish'
            ));

            // Add child items under "Patient"
            $addPatientUrl = add_query_arg(array('page' => 'mss_members', 'member' => 'patient', 'action' => 'add'), $baseUrl);
            wp_update_nav_menu_item($menuId, 0, array(
                'menu-item-title' => __('Add Patient', MSS_TEXT_DOMAIN),
                'menu-item-url' => $addPatientUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $patientItemId
            ));

            $viewPatientUrl = add_query_arg(array('page' => 'mss_members', 'member' => 'patient', 'action' => 'view'), $baseUrl);
            wp_update_nav_menu_item($menuId, 0, array(
                'menu-item-title' => __('View Patient', MSS_TEXT_DOMAIN),
                'menu-item-url' => $viewPatientUrl,
                'menu-item-status' => 'publish',
                'menu-item-parent-id' => $patientItemId
            ));
        } else {
            // If the menu exists, ensure it's assigned to the desired location
            $menuLocations = get_theme_mod('nav_menu_locations', array());

            // Check if the menu location is already set
            if (!isset($menuLocations['mss_admin_members_menu'])) {
                $menuLocations['mss_admin_members_menu'] = $menuExists->term_id;
                set_theme_mod('nav_menu_locations', $menuLocations);
            }
        }
      
        $display = $this->adminMembersContext->get_context();
        load_template($this->getTemplateFile("admin-members-display-tmpl"), true, ["display" => $display]);
    }

    /**
     * Getting Template path
     * 
     * * */
    private function getTemplateFile(string $fileName): string {



        return plugin_dir_path(__FILE__) . "/Templates/{$fileName}.php";
    }
}
