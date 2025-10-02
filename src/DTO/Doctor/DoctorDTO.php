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
     * @var string  First name 
     * @since 1.0.0
     * * */
    private string $first_name = '';
    private string $last_name = '';
    private string $gender = '';
    private string $dob = '';
    private string $email = '';
    private string $phone_number = '';
    private string $house_number = '';
    private string $street_name = '';
    private string $landmark = '';
    private string $address_line1 = '';
    private string $address_line2 = '';
    private string $city = '';
    private string $state = '';
    private string $postcode = '';
    private string $country = '';
    private string $website = '';
    private string $specialization = '';
    private string $year_of_experience = '';
    private string $medical_registration_number = '';
    private string $consultation_fees = '';
    private string $degrees = '';
    private string $college_university = '';
    private string $year_of_graduation = '';
    private string $affiliations = '';
    private string $working_days = '';
    private string $consultation_type = '';
    private string $employment_type = '';
    private string $department = '';
    private string $date_of_joining = '';
    private string $designation = '';
    private string $supervisor = '';
    private string $emergency_contact_name = '';
    private string $emergency_contact_relationship = '';
    private string $emergency_contact_phone = '';
    private string $username = '';
    private string $nickname = '';
    private string $display_name = '';
    private string $languages_spoken = '';
    private string $short_biography = '';
    private string $social_media_profile = '';
    private string $personal_statement = '';

    /**
     * @var int ID
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * * */
    private int $ID = 0;

    public function get_first_name(): string {
        return $this->first_name;
    }

    public function set_first_name( string $first_name ): void {
        $this->first_name = $first_name;
    }

    public function get_last_name(): string {
        return $this->last_name;
    }

    public function set_last_name( string $last_name ): void {
        $this->last_name = $last_name;
    }

    public function get_gender(): string {
        return $this->gender;
    }

    public function set_gender( string $gender ): void {
        $this->gender = $gender;
    }

    public function get_dob(): string {
        return $this->dob;
    }

    public function set_dob( string $dob ): void {
        $this->dob = $dob;
    }

    public function get_email(): string {
        return $this->email;
    }

    public function set_email( string $email ): void {
        $this->email = $email;
    }

    public function get_phone_number(): string {
        return $this->phone_number;
    }

    public function set_phone_number( string $phone_number ): void {
        $this->phone_number = $phone_number;
    }

    public function get_house_number(): string {
        return $this->house_number;
    }

    public function set_house_number( string $house_number ): void {
        $this->house_number = $house_number;
    }

    public function get_street_name(): string {
        return $this->street_name;
    }

    public function set_street_name( string $street_name ): void {
        $this->street_name = $street_name;
    }

    public function get_landmark(): string {
        return $this->landmark;
    }

    public function set_landmark( string $landmark ): void {
        $this->landmark = $landmark;
    }

    public function get_address_line1(): string {
        return $this->address_line1;
    }

    public function set_address_line1( string $address_line1 ): void {
        $this->address_line1 = $address_line1;
    }

    public function get_address_line2(): string {
        return $this->address_line2;
    }

    public function set_address_line2( string $address_line2 ): void {
        $this->address_line2 = $address_line2;
    }

    public function get_city(): string {
        return $this->city;
    }

    public function set_city( string $city ): void {
        $this->city = $city;
    }

    public function get_state(): string {
        return $this->state;
    }

    public function set_state( string $state ): void {
        $this->state = $state;
    }

    public function get_postcode(): string {
        return $this->postcode;
    }

    public function set_postcode( string $postcode ): void {
        $this->postcode = $postcode;
    }

    public function get_country(): string {
        return $this->country;
    }

    public function set_country( string $country ): void {
        $this->country = $country;
    }

    public function get_website(): string {
        return $this->website;
    }

    public function set_website( string $website ): void {
        $this->website = $website;
    }

    public function get_specialization(): string {
        return $this->specialization;
    }

    public function set_specialization( string $specialization ): void {
        $this->specialization = $specialization;
    }

    public function get_year_of_experience(): string {
        return $this->year_of_experience;
    }

    public function set_year_of_experience( string $year_of_experience ): void {
        $this->year_of_experience = $year_of_experience;
    }

    public function get_medical_registration_number(): string {
        return $this->medical_registration_number;
    }

    public function set_medical_registration_number( string $medical_registration_number ): void {
        $this->medical_registration_number = $medical_registration_number;
    }

    public function get_consultation_fees(): string {
        return $this->consultation_fees;
    }

    public function set_consultation_fees( string $consultation_fees ): void {
        $this->consultation_fees = $consultation_fees;
    }

    public function get_degrees(): string {
        return $this->degrees;
    }

    public function set_degrees( string $degrees ): void {
        $this->degrees = $degrees;
    }

    public function get_college_university(): string {
        return $this->college_university;
    }

    public function set_college_university( string $college_university ): void {
        $this->college_university = $college_university;
    }

    public function get_year_of_graduation(): string {
        return $this->year_of_graduation;
    }

    public function set_year_of_graduation( string $year_of_graduation ): void {
        $this->year_of_graduation = $year_of_graduation;
    }

    public function get_affiliations(): string {
        return $this->affiliations;
    }

    public function set_affiliations( string $affiliations ): void {
        $this->affiliations = $affiliations;
    }

    public function get_working_days(): string {
        return $this->working_days;
    }

    public function set_working_days( string $working_days ): void {
        $this->working_days = $working_days;
    }

    public function get_consultation_type(): string {
        return $this->consultation_type;
    }

    public function set_consultation_type( string $consultation_type ): void {
        $this->consultation_type = $consultation_type;
    }

    public function get_employment_type(): string {
        return $this->employment_type;
    }

    public function set_employment_type( string $employment_type ): void {
        $this->employment_type = $employment_type;
    }

    public function get_department(): string {
        return $this->department;
    }

    public function set_department( string $department ): void {
        $this->department = $department;
    }

    public function get_date_of_joining(): string {
        return $this->date_of_joining;
    }

    public function set_date_of_joining( string $date_of_joining ): void {
        $this->date_of_joining = $date_of_joining;
    }

    public function get_designation(): string {
        return $this->designation;
    }

    public function set_designation( string $designation ): void {
        $this->designation = $designation;
    }

    public function get_supervisor(): string {
        return $this->supervisor;
    }

    public function set_supervisor( string $supervisor ): void {
        $this->supervisor = $supervisor;
    }

    public function get_emergency_contact_name(): string {
        return $this->emergency_contact_name;
    }

    public function set_emergency_contact_name( string $emergency_contact_name ): void {
        $this->emergency_contact_name = $emergency_contact_name;
    }

    public function get_emergency_contact_relationship(): string {
        return $this->emergency_contact_relationship;
    }

    public function set_emergency_contact_relationship( string $emergency_contact_relationship ): void {
        $this->emergency_contact_relationship = $emergency_contact_relationship;
    }

    public function get_emergency_contact_phone(): string {
        return $this->emergency_contact_phone;
    }

    public function set_emergency_contact_phone( string $emergency_contact_phone ): void {
        $this->emergency_contact_phone = $emergency_contact_phone;
    }

    public function get_username(): string {
        return $this->username;
    }

    public function set_username( string $username ): void {
        $this->username = $username;
    }

    public function get_nickname(): string {
        return $this->nickname;
    }

    public function set_nickname( string $nickname ): void {
        $this->nickname = $nickname;
    }

    public function get_display_name(): string {
        return $this->display_name;
    }

    public function set_display_name( string $display_name ): void {
        $this->display_name = $display_name;
    }

    public function get_languages_spoken(): string {
        return $this->languages_spoken;
    }

    public function set_languages_spoken( string $languages_spoken ): void {
        $this->languages_spoken = $languages_spoken;
    }

    public function get_short_biography(): string {
        return $this->short_biography;
    }

    public function set_short_biography( string $short_biography ): void {
        $this->short_biography = $short_biography;
    }

    public function get_social_media_profile(): string {
        return $this->social_media_profile;
    }

    public function set_social_media_profile( string $social_media_profile ): void {
        $this->social_media_profile = $social_media_profile;
    }

    public function get_personal_statement(): string {
        return $this->personal_statement;
    }

    public function set_personal_statement( string $personal_statement ): void {
        $this->personal_statement = $personal_statement;
    }

    /**
     * Getter for ID
     * @return int $ID
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    public function get_id(): ?int {
        $this->ID ;
    }

    /**
     * Setter for ID
     * @return int $ID
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * * */
    public function set_id( int $id ) {
        $this->ID = $id;
    }
}
