<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Mapper\Doctor;

use MedixSolutionSuite\DTO\Doctor\DoctorRequestDTO;
use WP_User;

/**
 * Description of DoctorDTOToDBMapper
 *
 * @author dibya
 */
class DoctorDTOToDBMapper {

    private WP_User $doctor;
    private DoctorRequestDTO $dto;

    public function map( DoctorRequestDTO $requestDTO, WP_User $doctor ): ?WP_User {
        $this->doctor = $doctor;
        $this->dto = $requestDTO;
        $this->map_personal_info()
                ->map_permissions_info()
                ->default();
        return $this->doctor;
    }

    /**
     * map_personal_info
     * 
     * * */
    private function map_personal_info(): self {
        $this->doctor->first_name = $this->dto->get_first_name();
        $this->doctor->last_name = $this->dto->get_last_name();
        $this->doctor->user_email = $this->dto->get_email();
        $this->doctor->gender = $this->dto->get_gender();
        $this->doctor->dob = $this->dto->get_dob();
        return $this;
    }

    /**
     * Permissions Info 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_permissions_info(): self {
        $this->doctor->user_login = $this->dto->get_username();
        $this->doctor->nickname = $this->dto->get_nickname();
        $this->doctor->display_name = $this->dto->get_display_name();
        $this->doctor->user_pass = $this->dto->get_password();

        return $this;
    }

    /**
     * Default
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function default(): self {
        $this->doctor->ID = $this->dto->get_id();
        return $this;
    }
}
