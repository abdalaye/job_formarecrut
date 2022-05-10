<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatExperienceFormRequest extends FormRequest
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
            'poste'         => 'required',
            'employeur'     => 'required',
            'date_debut'    => 'required',
            'date_fin'      => 'required|date|after:date_debut',
            'city_id'       => 'required|exists:cities,id',
            'country_id'    => 'required|exists:countries,id',
            'description'   => 'required',
            'secteur_ids'   => 'required',
        ];
    }
}
