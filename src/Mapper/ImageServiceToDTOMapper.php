<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper;

use WP_Error;
use MedixSolutionSuite\DTO\DoctorImageDTO;

/**
 * Description of ImageServiceToDTOMapper
 *
 * @author dibya
 */
class ImageServiceToDTOMapper {
    public function __construct(private DoctorImageDTO $dto ) {
    }
    private function upload(array $files):DoctorImageDTO{
        
    }
}
