<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseRequest extends FormRequest
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
        if($this->step == '1') {
            return [
                'nom'         => 'required',
                'ninea'       => 'required',
                'rc'          => 'required',
                'n_employers' => 'required',
                'phone'       => 'required',
                'adresse'     => 'required'
            ];
        }

        if($this->step == '2') {
            return [
                'training.*.formation' => 'required',
                'training.*.etablissement' => 'required',
                'training.*.ville' => 'required',
                'training.*.debut_mois' => 'required',
                'training.*.debut_annee' => 'required',
                'training.*.fin_mois' => 'required',
                'training.*.fin_annee' => 'required',
                'training.*.description' => 'required',
            ];
        }

        if($this->step == '3') {
            return [
                'training.*.poste' => 'required',
                'training.*.employeur' => 'required',
                'training.*.ville' => 'required',
                'training.*.debut_mois' => 'required',
                'training.*.debut_annee' => 'required',
                'training.*.fin_mois' => 'required',
                'training.*.fin_annee' => 'required',
                'training.*.description' => 'required',
            ];
        }
    }
}
