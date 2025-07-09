<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckMasterKeyRequest extends FormRequest
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
            'rfid' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'rfid.required' => 'RFID tidak boleh kosong',
            'rfid.exists' => 'RFID tidak ditemukan'
        ];
    }
}
