<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Service\ImageServiceInterface;
use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\DoctorImageDTO;
use WP_Error;
use MedixSolutionSuite\Mapper\ImageServiceToDTOMapper;

/**
 * Description of ImageServiceImpl
 *
 * @author dibya
 */
class ImageServiceImpl implements ImageServiceInterface {

    public function __construct( private WP_Error $error, private ImageServiceToDTOMapper $mapper ) {
        
    }

    public function upload( array $files ): DoctorImageDTO|WP_Error {
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
        if ( is_array( $movefiles ) && !empty( $movefiles ) ) {
            foreach ( $movefiles as $key => $movefile ) {
                if ( isset( $movefile[ "error" ] ) ) {
                    $this->error->add( "mss_file_upload_fail", $movefile[ "error" ] );
                }
            }
        }
        if( $this->error->has_errors()){
            return $this->error;
        }
        return $this->mapper->upload($$movefiles);
    }
}
