<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            //
            'name' => ['required','string','max:255', Rule::unique('categories', 'name')->ignore($this->route('categorie'))],
            'description' => ['required','string','max:255'],
            'is_available' => ['required','boolean'],
        ];

    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis.',
            'description.required' => 'La description est requise.',
            'is_available.required' => 'La disponibilité est requise.',
            'name.unique' => 'Le nom de la catégorie doit être unique.',
        ];
    }
}
