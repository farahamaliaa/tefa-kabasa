<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolYearRequest extends FormRequest
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
                'unique:school_years,school_year',
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
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('showEditModal', true);
        throw new \Illuminate\Validation\ValidationException($validator, redirect()->back()->withErrors($validator, 'edit'));
    }
}
