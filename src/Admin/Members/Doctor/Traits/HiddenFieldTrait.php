<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

if ( !trait_exists( "HiddenFieldTrait" ) ) {

    trait HiddenFieldTrait {

        /**
         * ID
         * 
         * @param WP_Error | DoctorDTO $form_values
         * @return array $result
         * @since 1.0.0
         * @author dibya <dibyakrishna@gmail.com>
         * @access private
         */
        private function id_input_field( WP_Error|DoctorDTO $form_values = null ): array {
            $result = [
                "id" => "mss_admin_doctor_id",
                "name" => "mss_admin_doctor_id",
                "type" => "hidden"
            ];

            if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( $form_values->get_id()  ) ) {
                $result[ 'value' ] = (string)$form_values->get_id() ?? 0;
            }
            return $result;
        }
    }

}