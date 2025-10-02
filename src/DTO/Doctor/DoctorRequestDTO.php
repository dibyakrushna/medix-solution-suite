<?php

declare (strict_types=1);

namespace MedixSolutionSuite\DTO\Doctor;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;

/**
 * Description of DoctorRequestDTO
 *
 * @author dibya
 * @since 1.0.0;
 */
class DoctorRequestDTO extends DoctorDTO {

    /**
     * @var string $password
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    private string $password = "";
    

    /**
     * @var array Profile Image
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    private array $profile_picture = [];

    /**
     * @var array Medical License certificate
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    private array $medical_license = [];

    /**
     * @var array Certificate
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    private array $certifications = [];

    /**
     * Getter for profile picture
     * @return array $_FILE of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function get_profile_picture(): ?array {
        return $this->profile_picture;
    }

    /**
     * Setter for profile picture
     * @param array $profile_picture of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function set_profile_picture( array $profile_picture ): void {
        $this->profile_picture = $profile_picture;
    }

    /**
     * Getter for profile picture
     * @return array $_FILE of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function get_medical_license(): ?array {
        return $this->medical_license;
    }

    /**
     * Setter for profile picture
     * @param array $profile_picture of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function set_medical_license( array $medical_license ): void {
        $this->medical_license = $medical_license;
    }

    /**
     * Getter for profile picture
     * @return array $_FILE of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function get_certifications(): array {
        return $this->certifications;
    }

    /**
     * Setter for profile picture
     * @param array $profile_picture of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function set_certifications( array $certifications ): void {
        $this->certifications = $certifications;
    }

    /**
     * Getter for Password
     * @return array $_FILE of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function get_password(): ?string {
        return $this->password;
    }

    /**
     * Setter for Password
     * @param array $profile_picture of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function set_password( string $password ): void {
        $this->password = $password;
    }
}
