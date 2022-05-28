<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseOffreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre'       => 'required|string',
            'description' => 'required|string',
            'secteur_id'  => 'required',
            'expires_at'  => 'required|date',
            'address'     => 'required|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titre.required' => 'Vous devez indiquer le titre',
            'description.required' => 'Vous devez indiquer une description',
            'secteur_id.required' => 'Vous devez indiquer le secteur',
            'expires_at.required' => "Vous devez indiquer la date d'expiration",
            'expires_at.date' => "Le date d'expiration n'est pas valide.",
            'address.required' => "Vous devez indiquer l'adresse",
        ];
    }
}
