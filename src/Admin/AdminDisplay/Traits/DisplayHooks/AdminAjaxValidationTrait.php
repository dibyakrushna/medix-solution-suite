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

        private Request $request;

        /**
         * Upload file/files validation
         */
        private function upload_file_validate( Request $request ): array {
            $this->request = $request;

            if ( !check_ajax_referer( "mss_admin_file_upload", "security", false ) ) {
                wp_send_json_error( [ "message" => __( "Security verification failed", MSS_TEXT_DOMAIN ) ], 403 );
                die();
            }

            $this->upload_file_key_check();
            $this->upload_file_check_file();

            return $this->get_uplaod_file();
        }

        private function upload_file_key_check(): void {
            if ( !$this->request->has( "file_key" ) || empty( $this->request->post( "file_key" ) ) ) {
                wp_send_json_error( [ "message" => __( "No file key found", MSS_TEXT_DOMAIN ) ], 400 );
                die();
            }
        }

        private function upload_file_check_file(): void {
            $key = $this->request->post( "file_key" );

            if ( !$this->request->hasFile( $key ) ) {
                wp_send_json_error( [ "message" => __( "No file uploaded", MSS_TEXT_DOMAIN ) ], 400 );
                die();
            }

            // Check for upload errors in PHP
            $files = $this->request->file( $key );
            $this->check_php_upload_errors( $files );
        }

        private function get_uplaod_file(): array {
            $key = $this->request->post( "file_key" );
            return $this->request->file( $key );
        }

        /**
         * Check for PHP file upload errors
         */
        private function check_php_upload_errors( array $files ): void {
            if ( is_array( $files[ "error" ] ) ) {
                foreach ( $files[ "error" ] as $error ) {
                    if ( $error !== UPLOAD_ERR_OK ) {
                        $errorMessage = $this->get_upload_error_message( $error );
                        wp_send_json_error( [ "message" => $errorMessage ], 400 );
                        die();
                    }
                }
            } else {
                if ( $files[ "error" ] !== UPLOAD_ERR_OK ) {
                    $errorMessage = $this->get_upload_error_message( $files[ "error" ] );
                    wp_send_json_error( [ "message" => $errorMessage ], 400 );
                    die();
                }
            }
        }

        /**
         * Get human-readable upload error message
         */
        private function get_upload_error_message( int $errorCode ): string {
            switch ( $errorCode ) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    return __( "File size too large", MSS_TEXT_DOMAIN );
                case UPLOAD_ERR_PARTIAL:
                    return __( "File only partially uploaded", MSS_TEXT_DOMAIN );
                case UPLOAD_ERR_NO_FILE:
                    return __( "No file was uploaded", MSS_TEXT_DOMAIN );
                case UPLOAD_ERR_NO_TMP_DIR:
                    return __( "Missing temporary folder", MSS_TEXT_DOMAIN );
                case UPLOAD_ERR_CANT_WRITE:
                    return __( "Failed to write file to disk", MSS_TEXT_DOMAIN );
                case UPLOAD_ERR_EXTENSION:
                    return __( "File upload stopped by extension", MSS_TEXT_DOMAIN );
                default:
                    return __( "Unknown upload error", MSS_TEXT_DOMAIN );
            }
        }
    }

}