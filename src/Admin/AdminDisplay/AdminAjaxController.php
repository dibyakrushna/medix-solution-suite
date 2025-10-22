<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay;

use MedixSolutionSuite\Util\Request;

/**
 * Description of AdminDoctorAjaxController
 *
 * @author dibya
 */
class AdminAjaxController {

    public function __construct( private Request $request ) {
        
    }

    /**
     * Upload file/files
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * ** */
    public function upload_file() {
//        if ( !$this->request->isAjax() ) {
//            wp_send_json_error( [ "message" => __( "This is not ajax request", MSS_TEXT_DOMAIN ) ], 403 );
//            die();
//        }
        $key = "doctor_profile_image";
        if ( !$this->request->hasFile( $key ) ) {
            wp_send_json_error( [ "message" => __( "Not a file", MSS_TEXT_DOMAIN ) ], 403 );
            die();
        }
        check_ajax_referer( "mss_admin_file_upload", "security" );

        $files = $this->request->file( $key );
        $upload_overrides = array(
            'test_form' => false
        );
        $movefiles = [];
        if ( is_array( $files[ "name" ] ) ) {
            foreach ( $files[ "name" ] as $key => $value ) {
                if ( $files[ 'name' ][ $key ] ) {
                    $file = array(
                        'name' => $files[ 'name' ][ $key ],
                        'type' => $files[ 'type' ][ $key ],
                        'tmp_name' => $files[ 'tmp_name' ][ $key ],
                        'error' => $files[ 'error' ][ $key ],
                        'size' => $files[ 'size' ][ $key ]
                    );

                    $movefiles[] = wp_handle_upload( $file, $upload_overrides );
                }
            }
        } else {
            $movefiles[] = wp_handle_upload( $files, $upload_overrides );
        }
        if( is_array( $movefiles )&& !empty($movefiles) ){
            foreach ( $movefiles as $key => $movefile ) {
                if( isset($movefile["error"])){
                    wp_send_json_error(["message" => $movefile["error"]]);
                    die();
                }
                
            }
            wp_send_json_success($movefiles);
            die();
        }
        
        wp_send_json_error( ["message" => __("Something wrong", MSS_TEXT_DOMAIN)]);
        die();
    }
}
