<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRepairRequest extends FormRequest
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
            'repeater-group.*.repair' => 'required',
            'repeater-group.*.point' => 'required',
            'repeater-group.*.classroom_student_id' => 'required|array|exists:classroom_students,id',
            'repeater-group.*.classroom_student_id.*' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'classroom_student_id.required' => 'Siswa harus diisi',
            'classroom_student_id.exists' => 'Siswa tidak ditemukan',
            'repair_id.required' => 'Perbaikan harus diisi',
            'repair_id.exists' => 'Perbaikan tidak ditemukan',
        ];
    }
}
