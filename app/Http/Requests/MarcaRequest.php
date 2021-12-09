<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
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
            'nome' => "required|unique:marcas,nome,{$this->marca_id},id",
        ];
    }

    public function messages()
    {
        return [
            "nome.required"     => "Você precisa informar o nome da Marca",
            "nome.unique"       => "Essa marca já está cadastrada"
        ];
    }
}
