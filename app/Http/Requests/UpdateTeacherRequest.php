<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png',
            'nip' => 'required|max:18',
            'birth_date' => 'required|date',
            'birth_place' => 'required',
            'gender' => 'required',
            'nik' => 'required|max:16',
            'phone_number' => 'required|max:13',
            'address' => 'required',
            'active' => 'nullable',
            'status' => 'nullable',
            'religion_id' => 'required',
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
            'name.required' => 'Nama wajib di isi',
            'email.required' => 'Email wajib di isi',
            'nip.required' => 'NIP wajib diisi dan harus minimal 8 karakter.',
            'birth_date.required' => 'Tanggal lahir wajib diisi dan harus berupa tanggal yang valid.',
            'birth_place.required' => 'Tempat lahir wajib diisi dan harus berupa tanggal yang valid.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'nik.required' => 'NIK wajib diisi dan harus minimal 16 karakter.',
            'phone_number.required' => 'Nomor telepon wajib diisi dan harus minimal 15 karakter.',
            'address.required' => 'Alamat wajib diisi.',
            'status.required' => 'Status wajib diisi.',
            'religion_id.required' => 'Agama wajib diisi'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('showUpdateTeacher', true);
        throw new \Illuminate\Validation\ValidationException($validator, redirect()->back()->withInput()->withErrors($validator, 'update'));
    }
}
