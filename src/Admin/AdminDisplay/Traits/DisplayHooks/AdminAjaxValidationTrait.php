<?php

declare(strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay\Traits\DisplayHooks;

use MedixSolutionSuite\Util\Request;

/**
 * Description of AdminAjaxValidationTrait
 *
 * @author dibya
 */
if ( !trait_exists( "AdminAjaxValidationTrait" ) ) {

    trait AdminAjaxValidationTrait {

        private function upload_file_validate( Request $requst ) {
            $has_error = $this->upload_file_ajax_nonce_check();
            if ( !empty( $has_error ) ) {
                
            }
        }

        /**
         * 
         * ** */
        private function upload_file_ajax_nonce_check() {
            if ( !check_ajax_referer( "mss_admin_file_upload", "security" ) ) {
                return [ "message" => __( "Security issue", MSS_TEXT_DOMAIN ) ];
            }
            return [];
        }
    }

}

