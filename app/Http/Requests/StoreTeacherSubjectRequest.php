<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherSubjectRequest extends FormRequest
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
            'subject' => 'array|required',
            'subject.*' => 'required',
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
            'subject.required' => 'Nama mapel wajib diisi.',
            // 'subject.unique' => 'Mata pelajaran guru sudah ada'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('showSubjectTeacher', true);
        throw new \Illuminate\Validation\ValidationException($validator, redirect()->back()->withErrors($validator, 'create'));
    }
}
