<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15', // Validation pour le numéro de téléphone
            'hire_date' => 'required|date',
            'job_id' => 'required',
            'salary' => 'required|numeric|min:0', // Assurez-vous que le salaire est positif
            'commission_pct' => 'required|numeric|min:0|max:100', // Pourcentage de commission entre 0 et 100
            'manager_id' => 'required',
            'departement_id' => 'required',
            // 'job_id'         => 'required|exists:jobs,id', // Vérifie que job_id existe dans la table jobs
            // 'manager_id'     => 'required|exists:users,id', // Vérifie que manager_id existe dans la table users
            // 'department_id'  => 'required|exists:departments,id', // Vérifie que department_id existe dans la table departments
        ];
    }
}
