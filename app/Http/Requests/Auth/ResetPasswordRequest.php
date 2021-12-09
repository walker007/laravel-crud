<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            "token.required"        => "O Token de alteração precisa estar presente",
            "email.required"        => "Você precisa informar seu email",
            "email.email"           => "Seu email precisa ser válido",
            "password.required"     => "Você precisa informar uma senha",
            "password.min"          => "Sua senha precisa ter no mínimo 8 caracteres",
            "password.confirmed"    => "Suas senhas não coincidem",

        ];
    }
}
