<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductNewRequest extends FormRequest
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
            'name' => 'required', // Le numéro du compte est requis et doit être unique dans la table compte_bancaires
            'priceHt' => 'required|numeric|min:0', // Le solde est requis, doit être numérique et supérieur ou égal à zéro
        ];
    }

    
public function messages()
{
    return [
        'name.required' => 'Le nom du produit est requis.',
        'priceHt.required' => 'Le prix hors taxe est requis.',
        'priceHt.numeric' => 'Le prix hors taxe doit être numérique.',
        'priceHt.min' => 'Le prix hors taxe doit être supérieur ou égal à zéro.',
    ];
}
}
