<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper\Doctor;

use WP_User;
use MedixSolutionSuite\DTO\Doctor\DoctorResponseDTO;

/**
 * Description of DoctorDBToDTOMapper
 *
 * @author dibya
 */
class DoctorDBToDTOMapper {

    private array $mapper = [];

    /**
     * Db to DTO mapper
     * @param WP_User $doctor Wp user object
     * @param DoctorResponseDTO $dto_response Dto object
     * @return DoctorResponseDTO Return response object 
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * * */
    public function init_db_to_dto_mappinr( WP_User $doctor, DoctorResponseDTO $dto_response ): DoctorResponseDTO {
        $this->map_personal_info( $doctor )
                ->map_professional_info( $doctor )
                ->set_dto( $dto_response );
        return $dto_response;
    }

    /**
     * map_personal_info
     * 
     * * */
    private function map_personal_info( WP_User $doctor ): self {
        $this->mapper = array_merge( $this->mapper,
                [
                    "set_first_name" => $doctor->user_firstname,
                ]
        );
        return $this;
    }

    /**
     * map_professional_info
     * ** */
    private function map_professional_info( WP_User $doctor ): self {
        $this->mapper = array_merge( $this->mapper,
                [
                    "set_specialization" => $doctor->last_name
                ]
        );

        return $this;
    }

    /*
     * Set DTO 
     * ** */

    private function set_dto( DoctorResponseDTO $dto_response ) {
        foreach ( $this->mapper as $setter => $set_value ) {
            if ( $set_value !== null && !is_array( $set_value ) ) {
                call_user_func( [ $dto_response, $setter ], $set_value );
            }
        }
    }
}
