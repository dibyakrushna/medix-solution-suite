<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Service;

use MedixSolutionSuite\Util\Request;
use WP_Error;

/**
 * Description of ImageServiceInterface
 *
 * @author dibya
 */
if ( !interface_exists( "ImageServiceInterface" ) ) {

    interface ImageServiceInterface {
        public function upload( array $files ): array|WP_Error;
    }

}

