<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CandidatUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'photo' => 'nullable|file',
            'telephone' => 'required|max:20',
            'genre' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'adresse' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
