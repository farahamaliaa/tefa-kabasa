<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaxLateRequest extends FormRequest
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
            'max_late' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'max_late.required' => 'Durasi maksimal terlambat harus diisi',
            'max_late.min' => 'Durasi maksimal terlambat minimal :min menit',
        ];
    }
}