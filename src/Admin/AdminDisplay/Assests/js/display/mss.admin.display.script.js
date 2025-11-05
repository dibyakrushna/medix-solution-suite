jQuery(document).ready(function () {
    console.log(4444)
})
class XHRFileUploader {
    constructor(fileEle) {
        this.fileEle = fileEle;
        this.files = fileEle.files
        this.formData = new FormData();
        this.xhr = new XMLHttpRequest();
    }
    /**
     * Initiating Upload  files
     * **/
    initiateUpload() {
        if (!this.files) {
            return;
        }
        this.#prepareFormData();
        this.#handleXHR();
    }

    /**
     * Prepare FormData
     * ***/
    #prepareFormData() {
        const action = jQuery(this.fileEle).data("action") || "";
        const fileKey = jQuery(this.fileEle).data("file_key") || "";
        this.formData.append("action", action);
        this.formData.append("security", mss_admin_doc_script.wp_ajax_nonce);
        this.formData.append("file_key", fileKey);
        if (this.files.length > 1) {
            for (let i = 0; i < this.files.length; i++) {
                this.formData.append(fileKey + "[]", this.files[i]);
            }
        }
        if (this.files.length === 1) {
            this.formData.append(fileKey, this.files[0]);
        }

    }
    /**
     * xhr handler
     * **/
    #handleXHR() {
        this.xhr.open("POST", ajaxurl, true);
        //progress bar
        this.xhr.upload.addEventListener("progress", (e) => {
            this.#handleProgressBar(e);
        });
        //oncomplete
        this.xhr.onload = () => this.#handleCompleteRequest();
        this.xhr.send(this.formData);
    }

    #handleProgressBar(event) {
        const progressBar = this.#getProgressBar();
        const percentText = progressBar.next("span");
        const percent = Math.round((event.loaded / event.total) * 100);
        if (event.lengthComputable) {
            progressBar.parent().show();
            progressBar.val(percent);
            percentText.text(percent + "%");
        }
        if (100 === percent) {
            // progressBar.parent().hide();
            percentText.text("Wait")
        }
    }
    #getProgressBar() {
        const progressBar = jQuery(`#mss_upload_progress_${this.#getEleID()}`);
        return progressBar;
    }
    #getEleID() {
        const inputID = jQuery(this.fileEle).prop("id");
        return inputID;

    }
    #handleCompleteRequest() {
        if (this.xhr.status === 200) {
            const response = JSON.parse(this.xhr?.responseText);
            if (response?.success) {
                this.#handletemplate(response?.data)
                this.#handleAssignValue(response?.data)

            } else {
                alert("Error: " + response?.data);
            }
        } else {
            alert("Upload failed. Please try again.");
        }
    }

    #handletemplate(files) {
        if (Array.isArray(files)) {
            // Create HTML string of <img> tags
            const imagesHTML = files.map((val) => {
                if (val?.type?.includes("image")) {
                    console.log(val?.file_url);
                    return `<img alt="${val?.file_name}" src="${val?.file_url}" />`;
                }
                return "";
            }).join(""); // join array into single string

            // Find wrapper and insert HTML
            const wrapper = jQuery(this.fileEle).siblings(".mss-files-wraper");
            wrapper.find(".mss-files-item").html(imagesHTML).parent().show();
            this.fileEle.value = "";
            this.#getProgressBar().parent().hide();
        }
    }

    /**
     * Assiging value to holder
     * @param {Array} data 
     * **/
    #handleAssignValue(data) {
        if (Array.isArray(data)) {
            const eleID = this.#getEleID();
            const stringyFiData = JSON.stringify(data)
            console.log(JSON.parse(stringyFiData));
            jQuery(`#${eleID.trim()}_holder`).val(stringyFiData);
        }

    }

}