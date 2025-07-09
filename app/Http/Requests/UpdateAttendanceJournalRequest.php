<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttendanceJournalRequest extends FormRequest
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
            'teacher_journal_id' => 'required|exists:teacher_journals,id',
            'classroom_student_id' => 'required|exists:classroom_students,id',
            'lesson_hour_id' => 'required|exists:lesson_hours,id',
            'status' => 'required|exists:attendance_enum,value',
            'proof' => 'nullable',
            'description' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'teacher_journal_id.required' => 'Journal pelatih wajib diisi',
            'teacher_journal_id.exists' => 'Journal pelatih tidak valid',
            'classroom_student_id.required' => 'Pendaftar kelas wajib diisi',
            'classroom_student_id.exists' => 'Pendaftar kelas tidak valid',
            'lesson_hour_id.required' => 'Jam pelajaran wajib diisi',
            'lesson_hour_id.exists' => 'Jam pelajaran tidak valid',
            'status.required' => 'Status wajib diisi',
            'status.exists' => 'Status tidak valid',
        ];
    }
}
