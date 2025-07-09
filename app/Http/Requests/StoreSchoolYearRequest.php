<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolYearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'school_year' => $this->start_year . '/' . $this->end_year,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_year' => 'required',
            'end_year' => 'required',
            'school_year' => [
                // 'required',
                'unique:school_years,school_year',
                // 'regex:/^[0-9\/]+$/'
            ],
            'active' => 'nullable',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'school_year.required' => 'Tahun ajaran wajib diisi.',
            'school_year.unique' => 'Tahun ajaran sudah ada',
            // 'school_year.regex' => 'Tahun ajaran hanya boleh angka dan garis miring (/) saja.',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('showCreateModal', true);
        throw new \Illuminate\Validation\ValidationException($validator, redirect()->back()->withErrors($validator, 'create'));
    }
}
