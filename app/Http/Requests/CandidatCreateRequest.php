<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CandidatCreateRequest extends FormRequest
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
			'is_admin' => 'nullable',
			'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
            'etat' => 'nullable',
        ];
    }
}
