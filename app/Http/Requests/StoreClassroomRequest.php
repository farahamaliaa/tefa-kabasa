<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
            'store-class' => [
                'name' => 'required',
                'employee_id' => 'required',
                'level_class_id' => 'required',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Mohon untuk masukan namanya.',
            'employee_id.required' => 'Mohon untuk masukan wali kelasnya.',
            'level_class_id.required' => 'Mohon untuk masukkan tingkat kelasnya.',
        ];
    }
}
