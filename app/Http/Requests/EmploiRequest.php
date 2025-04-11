<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploiRequest extends FormRequest
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
            //Emplois
            'job_title' => 'required|string|max:255',
            'min_salary' => 'required|numeric|min:0|max:200000',
            'max_salary' => 'required|numeric|min:0|max:500000|gte:min_salary', // 3-Vérifie que max_salary >= min_salary
        ];
    }

    /**
     * 2-Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'job_title.required' => 'Le titre du poste est obligatoire.',
            'min_salary.required' => 'Le salaire minimum est obligatoire.',
            'max_salary.required' => 'Le salaire maximum est obligatoire.',
            'max_salary.gte' => 'Le salaire maximum doit être supérieur ou égal au salaire minimum.',
        ];
    }
}

