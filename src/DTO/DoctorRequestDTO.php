<?php

declare (strict_types=1);

namespace MedixSolutionSuite\DTO;


/**
 * Description of DoctorRequestDTO
 *
 * @author dibya
 * @since 1.0.0;
 */
class DoctorRequestDTO {

    /**
     * @var first_name
     * @since 1.0.0
     * ** */
    private string $first_name = "";

    /**
     * @var last_name
     * @since 1.0.0
     * ** */
    private string $last_name = "";

    /**
     * @var gender
     * @since 1.0.0
     * ** */
    private string $gender = "";

    /**
     * @var dob
     * @since 1.0.0
     * ** */
    private string $dob = "";

    /**
     * @var email
     * @since 1.0.0
     * ** */
    private string $email = "";

    /**
     * @var phone_number
     * @since 1.0.0
     * ** */
    private string $phone_number = "";

    /**
     * @var ntionality 
     * @since 1.0.0
     * ** */
    private string $ntionality = "";

    /**
     * @var website 
     * @since 1.0.0
     * ** */
    private string $website = "";

    /**
     * @var address 
     * @since 1.0.0
     * ** */
    private string $address = "";
    
     // Getters and Setters

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void {
        $this->first_name = $first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void {
        $this->last_name = $last_name;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function setGender(string $gender): void {
        $this->gender = $gender;
    }

    public function getDob(): string {
        return $this->dob;
    }

    public function setDob(string $dob): void {
        $this->dob = $dob;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPhoneNumber(): string {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): void {
        $this->phone_number = $phone_number;
    }

    public function getNtionality(): string {
        return $this->ntionality;
    }

    public function setNtionality(string $ntionality): void {
        $this->ntionality = $ntionality;
    }

    public function getWebsite(): string {
        return $this->website;
    }

    public function setWebsite(string $website): void {
        $this->website = $website;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function setAddress(string $address): void {
        $this->address = $address;
    }
    
    
}
