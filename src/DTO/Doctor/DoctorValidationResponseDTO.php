<?php

declare (strict_type=1);

namespace MedixSolutionSuite\DTO\Doctor;

/**
 * Description of DoctorValidationResponseDTO
 *
 * @author dibya
 */
class DoctorValidationResponseDTO {

    private array $first_name_err = [];
    private array $last_name_err = [];
    private array $gender_err = [];
    private array $dob_err = [];
    private array $email_err = [];
    private array $phone_number_err = [];
    private array $nationality_err = [];
    private array $website_err = [];
    private array $address_err = [];

    // Getters and Setters for first_name_err
    public function get_first_name_err(): array {
        return $this->first_name_err;
    }

    public function set_first_name_err( array $first_name_err ): void {
        $this->first_name_err = $first_name_err;
    }

    // Getters and Setters for last_name_err
    public function get_last_name_err(): array {
        return $this->last_name_err;
    }

    public function set_last_name_err( array $last_name_err ): void {
        $this->last_name_err = $last_name_err;
    }

    // Getters and Setters for gender_err
    public function get_gender_err(): array {
        return $this->gender_err;
    }

    public function set_gender_err( array $gender_err ): void {
        $this->gender_err = $gender_err;
    }

    // Getters and Setters for dob_err
    public function get_dob_err(): array {
        return $this->dob_err;
    }

    public function set_dob_err( array $dob_err ): void {
        $this->dob_err = $dob_err;
    }

    // Getters and Setters for email_err
    public function get_email_err(): array {
        return $this->email_err;
    }

    public function set_email_err( array $email_err ): void {
        $this->email_err = $email_err;
    }

    // Getters and Setters for phone_number_err
    public function get_phone_number_err(): array {
        return $this->phone_number_err;
    }

    public function set_phone_number_err( array $phone_number_err ): void {
        $this->phone_number_err = $phone_number_err;
    }

    // Getters and Setters for nationality_err
    public function get_nationality_err(): array {
        return $this->nationality_err;
    }

    public function set_nationality_err( array $nationality_err ): void {
        $this->nationality_err = $nationality_err;
    }

    // Getters and Setters for website_err
    public function get_website_err(): array {
        return $this->website_err;
    }

    public function set_website_err( array $website_err ): void {
        $this->website_err = $website_err;
    }

    // Getters and Setters for address_err
    public function get_address_err(): array {
        return $this->address_err;
    }

    public function set_address_err( array $address_err ): void {
        $this->address_err = $address_err;
    }
}
