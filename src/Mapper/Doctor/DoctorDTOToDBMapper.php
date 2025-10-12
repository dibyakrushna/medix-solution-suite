<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper\Doctor;

use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;

/**
 * Description of DoctorDTOToDBMapper
 *
 * @author dibya
 */
class DoctorDTOToDBMapper {

    private DoctorRequestDTO $dto;
    private array $metadata = [] ;
    private array $user_data = [];

    public function map( DoctorRequestDTO $requestDTO ): ?array {
        $this->dto = $requestDTO;
        $this->map_personal_info()
                ->map_permissions_info()
                ->default();
        return $this->user_data;
    }

    /**
     * map_personal_info
     * 
     * * */
    private function map_personal_info(): self {
        $this->user_data["first_name"] = $this->dto->get_first_name();
        $this->user_data["last_name"] = $this->dto->get_last_name();
        $this->user_data["user_email"] = $this->dto->get_email();
        $this->metadata["gender"] = $this->dto->get_gender();
        $this->metadata["dob"] = mysql2date( "Y-m-d", $this->dto->get_dob() ) ;
        return $this;
    }

    /**
     * Permissions Info 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_permissions_info(): self {
        $this->user_data["user_login"]= $this->dto->get_username();
        $this->user_data["nickname"] = $this->dto->get_nickname();
        $this->user_data["display_name"] = $this->dto->get_display_name();
        $this->user_data["user_pass"] = $this->dto->get_password();
        return $this;
    }

    /**
     * Default
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function default(): self {
      $this->user_data["ID"] = $this->dto->get_id();
        $this->user_data["meta_input"] = $this->metadata;
        $this->user_data["role"] = "mss_member_doctor";
        return $this;
    }
    
}
