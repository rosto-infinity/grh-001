<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploiGradeRequest extends FormRequest
{
    /**
     * 1 - Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 2 - Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // -Grades d'emploi
            'grade_level' => 'required|string|max:100|unique:emploi_grades,grade_level,' . $this->route('id'),
            'lowest_salary' => 'required|numeric|min:0|max:250000',
            'highest_salary' => 'required|numeric|min:0|max:500000|gte:lowest_salary', // -Vérifie que highest_salary >= lowest_salary
        ];
    }

    /**
     * 3 - Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'grade_level.required' => 'Le niveau de grade est obligatoire.',
            'grade_level.unique' => 'Le niveau de grade est déjà utilisé.',
            'lowest_salary.required' => 'Le salaire le plus bas est obligatoire.',
            'highest_salary.required' => 'Le salaire le plus élevé est obligatoire.',
            'highest_salary.gte' => 'Le salaire le plus élevé doit être supérieur ou égal au salaire le plus bas.',
        ];
    }
}
