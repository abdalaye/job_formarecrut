<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatFormationFormRequest extends FormRequest
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
            'titre'         => 'required',
            'etablissement' => 'required',
            'country_id'    => 'required|exists:countries,id',
            'city_id'       => 'required|exists:cities,id',
            'country_other' => 'nullable',
            'city_other'    => 'nullable',
            'en_cours'      => 'nullable',
            'date_debut'    => 'required',
            'date_fin'      => 'required|date|after:date_debut',
            'description'   => 'required',
        ];
    }
}
