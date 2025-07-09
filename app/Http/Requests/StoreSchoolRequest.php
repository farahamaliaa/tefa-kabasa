<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'image' => 'required',
            'pas_code' => 'required|max:10',
            'address' => 'required',
            'head_school' => 'required',
            'nip' => 'required',
            'website_school' => 'nullable|url',
            'description' => 'nullable',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'sub_district_id' => 'required',
            'type' => 'required',
            'level' => 'required',
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
            'phone_number.max' => 'Nomor telepon harus terdiri dari maximal 15 karakter.',
            'image.required' => 'Gambar wajib diunggah.',
            'pas_code.required' => 'Kode PAS wajib diisi.',
            'pas_code.max' => 'Kode PAS harus terdiri dari maximal 10 karakter.',
            'address.required' => 'Alamat wajib diisi.',
            'head_school.required' => 'Nama kepala sekolah wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'province.required' => 'Profinsi wajib di isi',
            'city.required' => 'Kabupaten atau kota wajib di isi',
            'sub_district_id.required' => 'Kecamatan wajib di isi',
            'type.required' => 'Tipe sekolah wajib di isi',
            'level.required' => 'Jenjang wajib di isi',
            'accreditation.required' => 'Akreditasi harus diisi',
        ];
    }
}
