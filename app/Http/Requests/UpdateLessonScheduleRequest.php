<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonScheduleRequest extends FormRequest
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
            'subject_id' => 'required',
            'employee_id' => 'required',
            'lesson_hour_end' => 'required',
            'lesson_hour_start' => 'required',
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
            'employee_id.required' => 'Guru wajib diisi.',
            'subject_id.required' => 'Mapel pelajaran wajib diisi.',
            'lesson_hour_start.required' => 'Jam mulai pelajaran wajib diisi.',
            'lesson_hour_end.required' => 'Jam selesai pelajaran wajib diisi.',
        ];
    }
}
