<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRepairRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'point' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama perbaikan wajib diisi',
            'name.string' => 'Nama perbaikan harus berupa string',
            'name.max' => 'Nama perbaikan tidak boleh lebih dari 255 karakter',
            'point.required' => 'Poin perbaikan wajib diisi',
            'point.numeric' => 'Poin perbaikan harus berupa angka',
            'point.min' => 'Poin perbaikan harus lebih dari 1',
        ];
    }
}
