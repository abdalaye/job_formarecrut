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
        if($this->step == 1) {
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

        if($this->step == 2) {
            return [
                'gender' => 'required|in:mr,mrs',
                'prenom' => 'required',
                'nomfamille' => 'required',
                'email' => 'required',
                'password' => 'required|min:9|confirmed',
            ];
        }
    }
}
