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

    public function __construct( private Request $request, private ImageServiceImpl $service) {
        
    }

    /**
     * Upload file/files
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * ** */
    public function upload_file() {

        
       $files =  $this->upload_file_validate($this->request);
       $this->service->upload( $files );
       
        

        wp_send_json_error( [ "message" => __( "Something wrong", MSS_TEXT_DOMAIN ) ] );
        die();
    }
}
