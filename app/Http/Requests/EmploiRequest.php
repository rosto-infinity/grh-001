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
            'min_salary' => 'required|numeric|min:0|max:200000', //
            'max_salary' => 'required|numeric|min:0|max:500000', // 
            
           
        ];
    }
}
