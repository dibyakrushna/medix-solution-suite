<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\AdminDisplay;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\Admin\AdminDisplay\Traits\DisplayHooks\AdminAjaxValidationTrait;
use MedixSolutionSuite\Service\ImageServiceImpl;

/**
 * Description of AdminDoctorAjaxController
 *
 * @author dibya
 */
class AdminAjaxController {

    use AdminAjaxValidationTrait;

    public function __construct( private Request $request, private ImageServiceImpl $service ) {
        
    }

    /**
     * Upload file/files
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * ** */
    public function upload_file() {
        
        $files = $this->upload_file_validate( $this->request );
        $files = $this->get_uplaod_file();
            
        $response_files = $this->service->upload( $files );

        if ( is_wp_error( $response_files ) ) {
            wp_send_json_error( [ "message" => __( $response_files->get_error_message(), MSS_TEXT_DOMAIN ) ] );
            die();
        }
        $for_json_as_array = [];
        if ( is_array( $response_files ) && !empty( $response_files ) ) {
            foreach ( $response_files as  $value ) {
                $for_json_as_array[] = [
                    "file_name" => $value->get_file_name(),
                    "file_url" => $value->get_file_url(),
                    "type" => $value->get_file_type()
                ];
            }
        }

        wp_send_json_success( $for_json_as_array );
        die();
    }
}
