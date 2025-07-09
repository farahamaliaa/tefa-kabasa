<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
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
            'email' => 'required|email',
            'npsn' => 'required|max:8',
            'phone_number' => 'required|max:15',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'pas_code' => 'required|max:10',
            'address' => 'required',
            'head_school' => 'required',
            'nip' => 'required',
            'website_school' => 'nullable|url',
            'description' => 'nullable',
            'accreditation' => 'required',
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
            'name.required' => 'Nama sekolah wajib diisi.',
            'email.required' => 'Email sekolah wajib diisi.',
            'email.email' => 'Email sekolah tidak valid.',
            'npsn.required' => 'NPSN wajib diisi.',
            'npsn.max' => 'NPSN harus terdiri dari maximal :max karakter.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'phone_number.max' => 'Nomor telepon harus terdiri dari maximal :max karakter.',
            'image.mimes' => 'Gambar harus berekstensi png, jpg atau jpeg.',
            'pas_code.required' => 'Kode PAS wajib diisi.',
            'pas_code.max' => 'Kode PAS harus terdiri dari maximal :max karakter.',
            'address.required' => 'Alamat wajib diisi.',
            'head_school.required' => 'Nama kepala sekolah wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'accreditation.required' => 'Akreditasi harus diisi',
        ];
    }
}
