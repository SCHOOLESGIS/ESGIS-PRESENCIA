<?php

namespace App\Http\Requests\modules;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModuleRequest extends FormRequest
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
            'module_name' => 'nullable|string|max:255',
            'module_code' => 'nullable|string|max:50',
            'module_hours' => 'nullable|integer',
            'description' => 'nullable|string',
            'filiere_id' => 'nullable|exists:filieres,filiere_id'
        ];
    }
}
