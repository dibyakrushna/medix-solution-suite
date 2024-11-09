<?php

use MedixSolutionSuite\Enums\GenderEnum;
?>
<div>
    <h1 class="wp-heading-inline">
        <?php esc_html_e("Add New", MSS_TEXT_DOMAIN) ?>			
    </h1>
    <form class="mss-admin-doctor" action="<?= esc_url(admin_url("admin.php") . "?page=mss_members&controller=doctor&action=save") ?>" method="POST">
        <?php wp_nonce_field(); ?>
        <h2><?php esc_html_e("Personal Information", MSS_TEXT_DOMAIN) ?></h2>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th>
                        <?php esc_html_e("First Name", MSS_TEXT_DOMAIN) ?>
                    </th>
                    <td>
                        <label for="mss_admin_doctor_first_name">
                            <input type="text" name="mss_admin_doctor_first_name" id="mss_admin_doctor_first_name" class="regular-text">
                            <?php esc_html_e("First name of doctor", MSS_TEXT_DOMAIN) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php esc_html_e("Last Name", MSS_TEXT_DOMAIN) ?>
                    </th>
                    <td>
                        <label for="mss_admin_doctor_last_name">
                            <input type="text" name="mss_admin_doctor_last_name" id="mss_admin_doctor_last_name" class="regular-text">
                            <?php esc_html_e("last name of doctor", MSS_TEXT_DOMAIN) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php esc_html_e("Gender", MSS_TEXT_DOMAIN) ?>
                    </th>
                    <td>
                        <label for="mss_admin_doctor_gender_female">
                            <input type="radio" name="mss_admin_doctor_gender" id="mss_admin_doctor_gender_female" class="regular-text" value="<?= esc_html(GenderEnum::FEMALE->value) ?>">


                            <?php esc_html_e("Female", MSS_TEXT_DOMAIN) ?>

                        </label>
                        <label for="mss_admin_doctor_gender_male">
                            <input type="radio" name="mss_admin_doctor_gender" id="mss_admin_doctor_gender_male" class="regular-text" value="<?= esc_html(GenderEnum::MALE->value) ?>">
                            <?php esc_html_e("Male", MSS_TEXT_DOMAIN) ?>
                        </label>
                        <label for="mss_admin_doctor_gender_other">
                            <input type="radio" name="mss_admin_doctor_gender" id="mss_admin_doctor_gender_other" class="regular-text" value="<?= esc_html(GenderEnum::OTHER->value) ?>">
                            <?php esc_html_e("Other", MSS_TEXT_DOMAIN) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php esc_html_e("DOB", MSS_TEXT_DOMAIN) ?>
                    </th>
                    <td>
                        <label for="mss_admin_doctor_dob">
                            <input type="date" name="mss_admin_doctor_dob" id="mss_admin_doctor_dob" class="regular-text">
                            <?php esc_html_e("date of birth  of doctor", MSS_TEXT_DOMAIN) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php esc_html_e("Phone Number", MSS_TEXT_DOMAIN) ?>
                    </th>
                    <td>
                        <label for="mss_admin_doctor_phone_num">
                            <input type="text" name="mss_admin_doctor_phone_num" id="mss_admin_doctor_phone_num" class="regular-text">
                            <?php esc_html_e("Phone Number of doctor", MSS_TEXT_DOMAIN) ?>
                        </label>

                    </td>
                </tr>
                <tr>
                    <th>
                        <?php esc_html_e("Email", MSS_TEXT_DOMAIN) ?>
                    </th>
                    <td>
                        <label for="mss_admin_doctor_email">
                            <input type="email" name="mss_admin_doctor_email" id="mss_admin_doctor_email" class="regular-text">
                            <?php esc_html_e("Email of doctor", MSS_TEXT_DOMAIN) ?>
                        </label>

                    </td>
                </tr>

            </tbody>
        </table>
        <?php
        $other_attributes = array('id' => 'mss-doctor-save-button-id');
        submit_button(__('Save', MSS_TEXT_DOMAIN), 'primary', 'mss-doctor-save', true, $other_attributes);
        ?>

    </form>
</div>


