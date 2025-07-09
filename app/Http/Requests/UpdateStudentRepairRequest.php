<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRepairRequest extends FormRequest
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
            'classroom_student_id' => 'required|exists:classroom_students,id',
            'repair_id' => 'required|exists:repairs,id',
            'is_approved' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'classroom_student_id.required' => 'Siswa harus diisi',
            'classroom_student_id.exists' => 'Siswa tidak ditemukan',
            'repair_id.required' => 'Perbaikan harus diisi',
            'repair_id.exists' => 'Perbaikan tidak ditemukan',
            'is_approved.required' => 'Tidak boleh kosong',
        ];
    }
}
