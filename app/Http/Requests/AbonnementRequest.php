<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AbonnementRequest extends FormRequest
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
        $rules = [
            "name" => "required",
            "statut" => "required|boolean",
            "type" => "required",
            "resume" => "required",
            "description" => "nullable",
        ];
        if(request("type")) {
            if(request("type") == 1)
            $rules["price_mensuel"] = "required";
            $rules["price_annuel"] = "required";
        }
        return $rules;
    }
}
