<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherMapleRequest extends FormRequest
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
            'maple_id' => 'required',
            'school_year_id' => 'required'
        ];
    }

    /**
     * Pesan kesalahan yang berlaku untuk permintaan ini.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'maple_id.required' => 'ID mapel wajib diisi.',
            'school_year_id.required' => 'ID tahun ajaran wajib diisi.',
        ];
    }
}
