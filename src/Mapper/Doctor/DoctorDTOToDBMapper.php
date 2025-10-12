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
    private array $metadata = [];
    private array $user_data = [];

    public function map( DoctorRequestDTO $requestDTO ): ?array {
        $this->dto = $requestDTO;
        $this->map_personal_info()
                ->map_permissions_info()
                ->map_professional_info()
                ->map_educational_professional_qualification()
                ->default();
        return $this->user_data;
    }

    /**
     * map_personal_info
     * 
     * * */
    private function map_personal_info(): self {
        $this->user_data[ "first_name" ] = $this->dto->get_first_name();
        $this->user_data[ "last_name" ] = $this->dto->get_last_name();
        $this->user_data[ "user_email" ] = $this->dto->get_email();
        $this->metadata[ "gender" ] = $this->dto->get_gender();
        $this->metadata[ "dob" ] = mysql2date( "Y-m-d", $this->dto->get_dob() );
        $this->metadata[ "phone_number" ] = $this->dto->get_phone_number();
        $this->metadata[ "house_number" ] = $this->dto->get_house_number();
        $this->metadata[ "street_name" ] = $this->dto->get_street_name();
        $this->metadata[ "landmark" ] = $this->dto->get_landmark();
        $this->metadata[ "address_line_1" ] = $this->dto->get_address_line1();
        $this->metadata[ "address_line_2" ] = $this->dto->get_address_line2();
        $this->metadata[ "city" ] = $this->dto->get_city();
        $this->metadata[ "state" ] = $this->dto->get_state();
        $this->metadata[ "zip_code" ] = $this->dto->get_postcode();
        $this->metadata[ "country" ] = $this->dto->get_country();
        $this->metadata[ "website" ] = $this->dto->get_website();
        return $this;
    }

    /**
     * Professional 
     * * */
    private function map_professional_info(): self {

        $this->metadata[ "specialization" ] = $this->dto->get_specialization();
        $this->metadata[ "year_of_experience" ] = $this->dto->get_year_of_experience();
        $this->metadata[ "medical_reg_number" ] = $this->dto->get_medical_registration_number();
        $this->metadata[ "consulation_fee" ] = $this->dto->get_consultation_fees();

        return $this;
    }

    /**
     * Educational and professional 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_educational_professional_qualification(): self {
        $this->metadata[ "degrees" ] = $this->dto->get_degrees();
        $this->metadata[ "college_university" ] = $this->dto->get_college_university();
        $this->metadata[ "year_of_grad" ] = $this->dto->get_year_of_graduation();
        $this->metadata[ "affiliations" ] = $this->dto->get_affiliations();

        return $this;
    }

    /**
     * Permissions Info 
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function map_permissions_info(): self {
        $this->user_data[ "user_login" ] = $this->dto->get_username();
        $this->user_data[ "nickname" ] = $this->dto->get_nickname();
        $this->user_data[ "display_name" ] = $this->dto->get_display_name();
        $this->user_data[ "user_pass" ] = $this->dto->get_password();
        return $this;
    }

    /**
     * Default
     * @author  dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * * */
    private function default(): self {
        $this->user_data[ "ID" ] = $this->dto->get_id();
        $this->user_data[ "meta_input" ] = $this->metadata;
        $this->user_data[ "role" ] = "mss_member_doctor";
        return $this;
    }
}
