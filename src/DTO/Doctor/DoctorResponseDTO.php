<?php

declare (strict_types=1);

namespace MedixSolutionSuite\DTO\Doctor;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;

/**
 * Description of DoctorResponseDTO
 *
 * @author dibya
 */
class DoctorResponseDTO extends DoctorDTO {

    /**
     * @var array Medical License certificate
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    private array $medical_license_images = [];

    /**
     * @var array Certificate
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    private array $certifications_images = [];

    /**
     * @var string Profile Image
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    private string $profile_picture_image = "";

    /**
     * Getter for profile picture Image
     * @return array $_FILE of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function get_profile_picture_image(): ?string {
        return $this->profile_picture_image;
    }
    
    /**
     * Setter for profile picture Image
     * @param array $profile_picture of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function set_profile_picture_image( string $profile_picture_image ): void {
        $this->profile_picture_image = $profile_picture_image;
    }
    
     /**
     * Getter for Medical License Images
     * @return array $_FILE of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function get_medical_license_images(): ?array {
        return $this->medical_license_images;
    }

    /**
     * Setter for Medical License Images
     * @param array $profile_picture of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function set_medical_license_images( array $medical_license_images ): void {
        $this->medical_license_images = $medical_license_images;
    }

    /**
     * Getter for Certificate Image
     * @return array certificate image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function get_certifications_images(): array {
        return $this->certifications_images;
    }

    /**
     * Setter for Certificate Image
     * @param array $certifications_images of profile image
     * @since 1.0.0
     * @author  dibya <dibyakrishna@gmail.com>
     * * */
    public function set_certifications_images( array $certifications_images ): void {
        $this->certifications_images = $certifications_images;
    }
}
