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
                'adresse'     => 'required',
                'description' => 'nullable',
                'logo'        => 'nullable|image|max:2048',
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
                'pro_experience.*.poste' => 'required',
                'pro_experience.*.employeur' => 'required',
                'pro_experience.*.ville' => 'required',
                'pro_experience.*.debut_mois' => 'required',
                'pro_experience.*.debut_annee' => 'required',
                'pro_experience.*.fin_mois' => 'required',
                'pro_experience.*.fin_annee' => 'required',
                'pro_experience.*.description' => 'required',
            ];
        }
    }
}
