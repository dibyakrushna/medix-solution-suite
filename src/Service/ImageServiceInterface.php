<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Util\Request;
use MedixSolutionSuite\DTO\DoctorImageDTO;

/**
 * Description of ImageServiceInterface
 *
 * @author dibya
 */
if ( !interface_exists( "ImageServiceInterface" ) ) {

    interface ImageServiceInterface {
        public function upload( Request $request ): ?DoctorImageDTO;
    }

}

