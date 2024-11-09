<?php
namespace MedixSolutionSuite\Util;
/**
 * Description of Request
 *
 * @author dibya
 */
class Request
{
    /**
     * Get all request data (GET, POST, etc.) with optional filtering.
     *
     * @return array
     */
    public function all(): array
    {
        return array_merge(
            filter_input_array(INPUT_GET, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?: [],
            filter_input_array(INPUT_POST, FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?: []
        );
    }

    /**
     * Get a specific input value from the request.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function input(string $key, mixed $default = null): mixed
    {
        return $this->get($key, $default) ?? $this->post($key, $default);
    }

    /**
     * Check if the request has a specific key.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return $this->get($key) !== null || $this->post($key) !== null;
    }

    /**
     * Get a specific value from the GET request with optional filtering.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS) ?? $default;
    }

    /**
     * Get a specific value from the POST request with optional filtering.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function post(string $key, mixed $default = null): mixed
    {
        return filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS) ?? $default;
    }

    /**
     * Check if the request method is POST.
     *
     * @return bool
     */
    public function isPost(): bool
    {
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST';
    }

    /**
     * Check if the request method is GET.
     *
     * @return bool
     */
    public function isGet(): bool
    {
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET';
    }

    /**
     * Check if the request is an AJAX call.
     *
     * @return bool
     */
    public function isAjax(): bool
    {
        return filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest';
    }

    /**
     * Check if the request has a file.
     *
     * @param string $key
     * @return bool
     */
    public function hasFile(string $key): bool
    {
        return isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK;
    }

    /**
     * Get file information for a specific key.
     *
     * @param string $key
     * @return array|null
     */
    public function file(string $key): ?array
    {
        return $this->hasFile($key) ? $_FILES[$key] : null;
    }

    /**
     * Move the uploaded file to a new location.
     *
     * @param string $key
     * @param string $destination
     * @return bool
     */
    public function moveFile(string $key, string $destination): bool
    {
        if (!$this->hasFile($key)) {
            return false;
        }

        $file = $_FILES[$key];
        return move_uploaded_file($file['tmp_name'], $destination);
    }

    /**
     * Get the original name of the uploaded file.
     *
     * @param string $key
     * @return string|null
     */
    public function fileName(string $key): ?string
    {
        return $this->hasFile($key) ? basename($_FILES[$key]['name']) : null;
    }

    /**
     * Get the file size of the uploaded file in bytes.
     *
     * @param string $key
     * @return int|null
     */
    public function fileSize(string $key): ?int
    {
        return $this->hasFile($key) ? (int) $_FILES[$key]['size'] : null;
    }

    /**
     * Get the MIME type of the uploaded file using file info.
     *
     * @param string $key
     * @return string|null
     */
    public function fileMimeType(string $key): ?string
    {
        if (!$this->hasFile($key)) {
            return null;
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $_FILES[$key]['tmp_name']);
        finfo_close($finfo);

        return $mimeType;
    }

    /**
     * Validate the uploaded file’s type and size.
     *
     * @param string $key
     * @param array $allowedTypes
     * @param int|null $maxSize (optional)
     * @return bool
     */
    public function validateFile(string $key, array $allowedTypes = [], ?int $maxSize = null): bool
    {
        if (!$this->hasFile($key)) {
            return false;
        }

        $fileType = $this->fileMimeType($key);
        $fileSize = $this->fileSize($key);

        if (!empty($allowedTypes) && !in_array($fileType, $allowedTypes, true)) {
            return false;
        }

        if ($maxSize !== null && $fileSize > $maxSize) {
            return false;
        }

        return true;
    }

    /**
     * Get JSON input data as an array.
     *
     * @return array|null
     */
    public function json(): ?array
    {
        $jsonData = file_get_contents('php://input');
        return json_decode($jsonData, true) ?? null;
    }
}
