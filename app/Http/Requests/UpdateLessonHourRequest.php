<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonHourRequest extends FormRequest
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
            'start' => 'required',
            'end' => 'required|after:start'
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
            'name.required' => 'Nama jam pelajaran harus diisi.',
            'start.required' => 'Waktu mulai jam pelajaran harus diisi.',
            'end.required' => 'Waktu selesai jam pelajaran harus diisi.',
            'end.after' => 'Waktu selesai harus setelah waktu mulai.',
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         if ($validator->fails()) {
    //             session()->flash('edit_errors', true);
    //         }
    //     });
    // }
}
