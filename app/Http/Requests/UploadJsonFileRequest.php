<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadJsonFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "file_name" => "required",
            'file'      => ['required', 'file', function ($attr, $val, $fail) {
                $file = $val;
                // Check if the file is a valid JSON file
                $jsonString = file_get_contents($file->getRealPath());
                json_decode($jsonString);

                if (json_last_error() != JSON_ERROR_NONE) {
                    $fail("Invalid jsoon file");
                }
            }],
        ];
    }
}
