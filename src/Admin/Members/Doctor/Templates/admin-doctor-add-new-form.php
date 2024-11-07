<div>
    <h1 class="wp-heading-inline">
        <?php esc_html_e("Add New", MSS_TEXT_DOMAIN) ?>			
    </h1>
    <form class="mss-admin-doctor">
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
                        <label for="mss_admin_doctor_gender">
                            <input type="text" name="mss_admin_doctor_gender" id="mss_admin_doctor_gender" class="regular-text">
                            <?php esc_html_e("Gender of doctor", MSS_TEXT_DOMAIN) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php esc_html_e("DOB", MSS_TEXT_DOMAIN) ?>
                    </th>
                    <td>
                        <label for="mss_admin_doctor_dob">
                            <input type="text" name="mss_admin_doctor_dob" id="mss_admin_doctor_dob" class="regular-text">
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
                            <input type="text" name="mss_admin_doctor_email" id="mss_admin_doctor_email" class="regular-text">
                            <?php esc_html_e("Email of doctor", MSS_TEXT_DOMAIN) ?>
                        </label>

                    </td>
                </tr>

            </tbody>
        </table>

    </form>
</div>


