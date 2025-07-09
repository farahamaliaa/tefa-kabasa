<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolPointRequest extends FormRequest
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
            'max_points' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'max_points.required' => 'Maksimal poin harus diisi.',
            'max_points.numeric' => 'Maksimal poin harus berupa angka.',
        ];
    }
}
