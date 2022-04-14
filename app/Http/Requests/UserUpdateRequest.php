<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
	{
		return Auth::check();;
	}

	public function rules()
	{
        $id = $this->id;

        return [
			'nom' => 'required|max:255',
			'prenom' => 'required|max:255',
			'is_admin' => 'nullable',
			'email' => 'required|email|unique:users,email,' . $id . '|max:255',
            'password' => 'required|confirmed|min:6',
            'etat' => 'nullable',
		];
    }
}
