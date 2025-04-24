<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'description' => [ 'string', 'max:255'],
            'prix' => ['required', 'numeric', 'min:0'],
            'quantite' => ['required', 'integer', 'min:0'],
            'dosage' => ['string', 'max:255'],
            'expiration_date' => ['date', 'after_or_equal:today'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'is_available' => ['required', 'boolean'],
            'categorie_id' => ['required', 'exists:categories,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'prix.required' => 'Le prix est requis.',
            'prix.numeric' => 'Le prix doit être un nombre.',
            'prix.min' => 'Le prix doit être supérieur ou égal à 0.',
            'quantite.required' => 'La quantité est requise.',
            'quantite.integer' => 'La quantité doit être un entier.',
            'quantite.min' => 'La quantité doit être supérieure ou égale à 0.',
            'dosage.string' => 'Le dosage doit être une chaîne de caractères.',
            'expiration_date.date' => 'La date d\'expiration doit être une date valide.',
            'expiration_date.after_or_equal' => 'La date d\'expiration doit être égale ou postérieure à aujourd\'hui.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif ou svg.',
            'image.max' => 'L\'image ne doit pas dépasser 5 Mo.',
            'is_available.required' => 'La disponibilité est requise.',
            'categorie_id.required' => 'La catégorie est requise.',
        ];
    }
}
