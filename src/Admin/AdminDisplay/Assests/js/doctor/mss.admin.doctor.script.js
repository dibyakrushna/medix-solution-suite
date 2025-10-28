jQuery(document).ready(function ($) {
    /**
     * Uploading profile image
     * **/
    jQuery(document).on("change", "#mss_admin_doctor_profile_picture", function () {
        const fileInput = this;
        const file = fileInput.files[0];
        if (!file)
            return;

        const formData = new FormData();
        formData.append("action", "admin_doctor_profile_upload");
        formData.append("security", mss_admin_doc_script.wp_ajax_nonce);
        formData.append("file_key", "doctor_profile_image");
        formData.append("doctor_profile_image", file);

        const progressBar = jQuery("#mss_upload_progress_mss_admin_doctor_profile_picture");
        const percentText = progressBar.next("span");
        const preview = jQuery("#mss_preview");

        const xhr = new XMLHttpRequest();
        xhr.open("POST", ajaxurl, true);

        // progress event
        xhr.upload.addEventListener("progress", function (e) {
            if (e.lengthComputable) {
                const percent = Math.round((e.loaded / e.total) * 100);
                progressBar.parent().show();
                progressBar.val(percent);
                percentText.text(percent + "%");
            }
        });

        // on complete
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                console.log(response)
                if (response.success) {
                    percentText.text("Upload Complete ✅");
                    preview.attr("src", response.data.image_url).show();
                } else {
                    alert("Error: " + response.data);
                }
            } else {
                alert("Upload failed. Please try again.");
            }
        };
        xhr.onerror = function(){
            
        }

        xhr.send(formData);
    });

})


