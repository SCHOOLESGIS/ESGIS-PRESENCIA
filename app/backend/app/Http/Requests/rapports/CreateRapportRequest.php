<?php

namespace App\Http\Requests\rapports;

use Illuminate\Foundation\Http\FormRequest;

class CreateRapportRequest extends FormRequest
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
            'enseignant_id' => 'required|exists:enseignants,id',
            'hour_number' => 'required|integer|min:0',
            'absence_number' => 'required|integer|min:0',
            'justification_number' => 'required|integer|min:0',
        ];
    }
}
