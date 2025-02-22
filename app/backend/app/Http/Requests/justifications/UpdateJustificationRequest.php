<?php

namespace App\Http\Requests\justifications;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJustificationRequest extends FormRequest
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
            'absence_id' => 'nullable|exists:absences,absence_id',
            'type' => 'nullable|string|max:255',
            'doc' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ];
    }
}
