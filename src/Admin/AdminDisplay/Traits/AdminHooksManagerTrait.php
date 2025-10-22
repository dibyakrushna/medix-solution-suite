<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay\Traits;

use MedixSolutionSuite\Admin\AdminDisplay\Traits\DoctorHooks\AdminDoctorHooksTrait;
use MedixSolutionSuite\Admin\AdminDisplay\Traits\DisplayHooks\AdminDisplayHooksTrait;
use MedixSolutionSuite\Admin\AdminDisplay\AdminAjaxController;

if ( !trait_exists( "AdminHooksManagerTrait" ) ) {

    trait AdminHooksManagerTrait {

        use AdminDoctorHooksTrait,
            AdminDisplayHooksTrait;

        private function hooks( 
                AdminAjaxController $admin_doc_ajax
                ) {
            
            add_action( "admin_enqueue_scripts", [ $this, "mss_admin_assets" ] );
            add_action( 'init', [ $this, 'create_mss_member_role' ] );
            $this->mss_doctor_ajax($admin_doc_ajax);
        }

        /**
         * Admin assets
         * @since 1.0.0
         * @version 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * * */
        public function mss_admin_assets( $hook ) {
            $this->mss_doctor_admin_assets( $hook );
            $this->mss_admin_display_assests( $hook );
        }
    }

}