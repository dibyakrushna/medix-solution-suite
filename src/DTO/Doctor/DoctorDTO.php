<?php

declare(strict_types=1);

namespace MedixSolutionSuite\DTO\Doctor;

/**
 * Description of DoctorDTO
 *
 * @since 1.0.0
 */
abstract class DoctorDTO {

    /**
     * @var string $first_name
     */
    private string $first_name = '';

    /**
     * @var string $last_name
     */
    private string $last_name = '';

    /**
     * @var string $gender
     */
    private string $gender = '';

    /**
     * @var string $dob
     */
    private string $dob = '';

    /**
     * @var string $email
     */
    private string $email = '';

    /**
     * @var string $phone_number
     */
    private string $phone_number = '';

    /**
     * @var string $nationality
     */
    private string $nationality = '';

    /**
     * @var string $website
     */
    private string $website = '';

    /**
     * @var string $address
     */
    private string $address = '';

    // Getters and Setters

    public function get_first_name(): string {
        return $this->first_name;
    }

    public function set_first_name(string $first_name): void {
        $this->first_name = $first_name;
    }

    public function get_last_name(): string {
        return $this->last_name;
    }

    public function set_last_name(string $last_name): void {
        $this->last_name = $last_name;
    }

    public function get_gender(): string {
        return $this->gender;
    }

    public function set_gender(string $gender): void {
        $this->gender = $gender;
    }

    public function get_dob(): string {
        return $this->dob;
    }

    public function set_dob(string $dob): void {
        $this->dob = $dob;
    }

    public function get_email(): string {
        return $this->email;
    }

    public function set_email(string $email): void {
        $this->email = $email;
    }

    public function get_phone_number(): string {
        return $this->phone_number;
    }

    public function set_phone_number(string $phone_number): void {
        $this->phone_number = $phone_number;
    }

    public function get_nationality(): string {
        return $this->nationality;
    }

    public function set_nationality(string $nationality): void {
        $this->nationality = $nationality;
    }

    public function get_website(): string {
        return $this->website;
    }

    public function set_website(string $website): void {
        $this->website = $website;
    }

    public function get_address(): string {
        return $this->address;
    }

    public function set_address(string $address): void {
        $this->address = $address;
    }
}
