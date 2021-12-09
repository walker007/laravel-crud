<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'          => "required",
            'email'         => "required|unique:users,email,{$this->user_id},id",
            'password'      => "required|confirmed",
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => "Você precisa informar o nome",
            'email.required'        => "Você precisa informar um e-mail",
            'email.unique'          => "O e-mail precisa ser único",
            'password.required'     => "Você precisa informar uma senha",
            'password.confirmed'    => "Suas senhas não coincidem",
        ];
    }
}
