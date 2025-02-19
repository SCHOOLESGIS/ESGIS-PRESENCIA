<?php

namespace App\Http\Requests\filieres;

use Illuminate\Foundation\Http\FormRequest;

class CreateFiliereRequest extends FormRequest
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
            'filiere_name' => 'required|string|max:255|unique:filieres,filiere_name',
            'filiere_level' => 'required|string|in:Licence,Master,Doctorat',
        ];
    }
}
