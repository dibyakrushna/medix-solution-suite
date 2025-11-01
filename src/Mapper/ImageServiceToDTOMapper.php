<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper;

use WP_Error;
use MedixSolutionSuite\DTO\ImageDTO;

/**
 * Description of ImageServiceToDTOMapper
 *
 * @author dibya
 */
class ImageServiceToDTOMapper {

    public function __construct( private ImageDTO $dto ) {
        
    }

    public function upload( array $files ):? array {
        $files_container = [];
        if ( is_array( $files ) ) {
            foreach ( $files as $key => $value ) {
                $this->dto->set_file_name( wp_basename( $value[ "file" ] ) );
                $this->dto->set_file_url( $value[ "url" ] );
                $this->dto->set_file_type( $value[ "type" ]);
                $files_container[] = $this->dto;
            }
        }
        return $files_container;
    }
}
