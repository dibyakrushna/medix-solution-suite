jQuery(document).ready(function ($) {
    /**
     * Uploading profile image
     * **/

    $(document).on("change", "#mss_admin_doctor_profile_picture", function () {
        const uploader = new XHRFileUploader(this);
        uploader.initiateUpload();
    });

});

