<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Le champs est non requis',
            'email.required'=>'L\'email est requis',
            'email.unique'=>'Cette adresse mail est déjà liée à un compte',
            'password.required'=>'Le mot de passe est requis',
        ];
    }
}
