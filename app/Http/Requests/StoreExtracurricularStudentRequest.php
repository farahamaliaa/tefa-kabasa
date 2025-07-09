<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExtracurricularStudentRequest extends FormRequest
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
            'classroom_id' => 'required|exists:classrooms,id',
            'student_id' => 'required|exists:students,id',
        ];
    }

    public function messages(): array
    {
        return [
            'classroom_id.required' => 'Kelas harus diisi',
            'classroom_id.exists' => 'Kelas tidak ditemukan',
            'student_id.required' => 'Siswa harus diisi',
            'student_id.exists' => 'Siswa tidak ditemukan',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('showCreateModal', true);
        throw new \Illuminate\Validation\ValidationException($validator, redirect()->back()->withErrors($validator, 'create'));
    }
}
