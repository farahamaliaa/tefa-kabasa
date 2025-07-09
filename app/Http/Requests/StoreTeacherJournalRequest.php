<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherJournalRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'attendance' => 'required|array',
            'attendance.*' => 'required|string|in:alpha,permit,sick,present'
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'attendance.required' => 'Kehadiran harus diisi.',
            'attendance.*.required' => 'Status kehadiran harus diisi.',
            'attendance.*.in' => 'Status kehadiran harus salah satu dari masuk, alpha, permit, atau sakit.',
        ];
    }
}
