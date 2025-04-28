<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionRequest extends FormRequest
{
    /**
     * 1 -- Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 2 -- Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // - Nom de la région
            'region_name' => 'required|string|max:100|unique:regions,region_name,' . $this->route('id'),
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ];
    }

    /**
     * 3 -- Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'region_name.required' => 'Le nom de la région est obligatoire.',
            'region_name.unique' => 'Le nom de la région est déjà utilisé.',
            'region_name.max' => 'Le nom de la région ne peut pas dépasser 100 caractères.',
            'created_at.date' => 'La date de création doit être une date valide.',
            'updated_at.date' => 'La date de mise à jour doit être une date valide.',
        ];
    }
}
