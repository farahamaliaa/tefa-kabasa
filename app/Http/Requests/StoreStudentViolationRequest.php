<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentViolationRequest extends FormRequest
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
            'repeater-group' => 'required',
            'repeater-group.*.violation_id' => 'required',
            'repeater-group.*.student_id' => 'required|array',
            'repeater-group.*.student_id.*' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'repeater-group.required' => 'Data pelanggaran diperlukan.',
            'repeater-group.*.violation_id.required' => 'Jenis pelanggaran harus dipilih.',
            'repeater-group.*.student_id.required' => 'Nama siswa yang melakukan pelanggaran harus dipilih.',
            'repeater-group.*.student_id.array' => 'Nama siswa harus berupa daftar pilihan.',
            'repeater-group.*.student_id.*.required' => 'Setiap siswa yang melakukan pelanggaran harus dipilih.',
        ];
    }
}
