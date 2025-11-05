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

    public function upload( array $files ): ?array {
        $files_container = [];
        if ( is_array( $files ) ) {
            foreach ( $files as $value ) {
                $dto = clone $this->dto;
                $dto->set_file_name( sanitize_file_name( wp_basename( $value[ "file" ] ) ) );
                $dto->set_file_url( esc_url_raw( $value[ "url" ] ) );
                $dto->set_file_type( sanitize_mime_type( $value[ "type" ] ) );
                $files_container[] = $dto;
            }
        }

        return $files_container;
    }
}
