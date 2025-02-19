<?php

namespace App\Http\Requests\modules;

use Illuminate\Foundation\Http\FormRequest;

class CreateModuleRequest extends FormRequest
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
            'module_name' => 'required|string|max:255',
            'module_code' => 'required|string|max:50|unique:modules,module_code',
            'description' => 'nullable|string',
            'filiere_id' => 'required|exists:filieres,id',
        ];
    }
}
