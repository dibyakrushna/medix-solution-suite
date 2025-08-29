<?php

declare (strict_type=1);

namespace MedixSolutionSuite\Admin\Members\Doctor\Traits;

use MedixSolutionSuite\DTO\Doctor\DoctorDTO;
use WP_Error;

trait ProfessionalFieldTrait {

    /**
     * Adding Specialization
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function specialization_select_field( WP_Error|DoctorDTO $form_values = null ): ?array {

        $result = [
            "header" => __( "Specialization", MSS_TEXT_DOMAIN ),
            "classes" => [ "regular-text" ],
            "id" => "mss_admin_doctor_specialization",
            "name" => "mss_admin_doctor_specialization",
            "error" => false,
            "optgroup" => apply_filters( "mss_doctor_specializations", [
                "general_practice" => [
                    "optgroup_label" => __( "General Practitioner / Family Medicine", MSS_TEXT_DOMAIN ),
                    "options" => [
                        "general" => __( "General Practitioner", MSS_TEXT_DOMAIN )
                    ]
                ],
                "internal_medicine" => [
                    "optgroup_label" => __( "Internal Medicine", MSS_TEXT_DOMAIN ),
                    "options" => [
                        "cardiology" => __( "Cardiology", MSS_TEXT_DOMAIN ),
                        "endocrinology" => __( "Endocrinology", MSS_TEXT_DOMAIN ),
                        "gastroenterology" => __( "Gastroenterology", MSS_TEXT_DOMAIN ),
                        "pulmonology" => __( "Pulmonology", MSS_TEXT_DOMAIN ),
                        "nephrology" => __( "Nephrology", MSS_TEXT_DOMAIN ),
                        "rheumatology" => __( "Rheumatology", MSS_TEXT_DOMAIN ),
                        "hematology" => __( "Hematology", MSS_TEXT_DOMAIN ),
                        "oncology" => __( "Oncology", MSS_TEXT_DOMAIN ),
                        "infectious_disease" => __( "Infectious Disease", MSS_TEXT_DOMAIN ),
                    ]
                ],
                "pediatrics" => [
                    "optgroup_label" => __( "Pediatrics", MSS_TEXT_DOMAIN ),
                    "options" => [
                        "pediatric_cardiology" => __( "Pediatric Cardiology", MSS_TEXT_DOMAIN ),
                        "pediatric_neurology" => __( "Pediatric Neurology", MSS_TEXT_DOMAIN ),
                        "pediatric_endocrinology" => __( "Pediatric Endocrinology", MSS_TEXT_DOMAIN ),
                        "neonatology" => __( "Neonatology", MSS_TEXT_DOMAIN ),
                    ]
                ],
                "obgyn" => [
                    "optgroup_label" => __( "Obstetrics & Gynecology", MSS_TEXT_DOMAIN ),
                    "options" => [
                        "maternal_fetal" => __( "Maternal-Fetal Medicine", MSS_TEXT_DOMAIN ),
                        "gynec_oncology" => __( "Gynecologic Oncology", MSS_TEXT_DOMAIN ),
                        "reproductive_endocrinology" => __( "Reproductive Endocrinology & Infertility", MSS_TEXT_DOMAIN ),
                    ]
                ],
                "orthopedics" => [
                    "optgroup_label" => __( "Orthopedic Surgery", MSS_TEXT_DOMAIN ),
                    "options" => [
                        "sports_medicine" => __( "Sports Medicine", MSS_TEXT_DOMAIN ),
                        "spine_surgery" => __( "Spine Surgery", MSS_TEXT_DOMAIN ),
                        "pediatric_orthopedics" => __( "Pediatric Orthopedics", MSS_TEXT_DOMAIN ),
                        "joint_replacement" => __( "Joint Replacement", MSS_TEXT_DOMAIN ),
                    ]
                ],
                "neurology" => [
                    "optgroup_label" => __( "Neurology", MSS_TEXT_DOMAIN ),
                    "options" => [
                        "stroke" => __( "Stroke / Vascular Neurology", MSS_TEXT_DOMAIN ),
                        "epileptology" => __( "Epilepsy", MSS_TEXT_DOMAIN ),
                        "neurophysiology" => __( "Clinical Neurophysiology", MSS_TEXT_DOMAIN ),
                        "movement" => __( "Movement Disorders", MSS_TEXT_DOMAIN ),
                        "neuromuscular" => __( "Neuromuscular Medicine", MSS_TEXT_DOMAIN ),
                    ]
                ],
                "psychiatry" => [
                    "optgroup_label" => __( "Psychiatry", MSS_TEXT_DOMAIN ),
                    "options" => [
                        "child_psychiatry" => __( "Child & Adolescent Psychiatry", MSS_TEXT_DOMAIN ),
                        "geriatric_psychiatry" => __( "Geriatric Psychiatry", MSS_TEXT_DOMAIN ),
                        "forensic_psychiatry" => __( "Forensic Psychiatry", MSS_TEXT_DOMAIN ),
                        "addiction_psychiatry" => __( "Addiction Psychiatry", MSS_TEXT_DOMAIN ),
                    ]
                ]
            ] )
        ];

        if ( !is_null( $form_values ) && is_wp_error( $form_values ) && !empty( trim( $form_values->get_error_message( "mss_admin_doctor_specialization" ) ) ) ) {
            $result[ 'error' ] = true;
            $result[ 'description' ] = $form_values->get_error_message( "mss_admin_doctor_specialization" );
        }

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_last_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_specialization();
        }

        return $result;
    }

    /**
     * Adding Sub-specialization
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function year_of_experience_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "id" => "mss_admin_doctor_year_of_experience",
            "name" => "mss_admin_doctor_year_of_experience",
            "error" => false,
            "header" => esc_html( "Year Of Experience", MSS_TEXT_DOMAIN ),
            "label" => esc_html( "Last name of doctor", MSS_TEXT_DOMAIN ),
        ];

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_last_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_last_name();
        }

        return $result;
    }

    /**
     * Adding Sub-specialization
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function medical_registration_number_iput_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "id" => "mss_admin_doctor_medical_registartion_number",
            "name" => "mss_admin_doctor_medical_registartion_number",
            "error" => false,
            "header" => esc_html( "Medical Registration Number", MSS_TEXT_DOMAIN ),
            "description" => esc_html( "Specific to the country, e.g., NMC or Medical Council number", MSS_TEXT_DOMAIN )
        ];

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_last_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_last_name();
        }

        return $result;
    }
    
    /**
     * Adding Sub-specialization
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function consulation_fee_iput_field( WP_Error|DoctorDTO $form_values = null ): ?array {
        $result = [
            "id" => "mss_admin_doctor_consulation_fee",
            "name" => "mss_admin_doctor_consulation_fee",
            "error" => false,
            "header" => esc_html( "Consultation Fees", MSS_TEXT_DOMAIN ),
        ];

        if ( !is_null( $form_values ) && $form_values instanceof DoctorDTO && !empty( trim( $form_values->get_last_name() ) ) ) {
            $result[ 'value' ] = $form_values->get_last_name();
        }

        return $result;
    }
    
      /**
     * Medical License/Certificate Upload
     * 
     * @param WP_Error | DoctorDTO $form_values
     * @return array $result
     * @since 1.0.0
     * @author dibya <dibyakrishna@gmail.com>
     * @access private
     */
    private function certificate_input_field( WP_Error|DoctorDTO $form_values = null ): ?array {
         $result = [
            "type" => "file",
            "header" => esc_html( "Medical License/Certificate", MSS_TEXT_DOMAIN ),
            "id" => "mss_admin_doctor_certificate",
            "name" => "mss_admin_doctor_certificate",
        ];
        return $result;
        
    }
}
