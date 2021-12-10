<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'documento'     => "required|unique:fornecedores,documento,{$this->fornecedor_id},id",
            'nome'          => "required",
            'produtos'      => "required",
        ];
    }

    public function messages()
    {
        return [
            'documento.required'     => "Você precisa informar um documento CPF ou CNPJ",
            'documento.unique'       => "Este fornecedor já foi cadastrado",
            'nome.required'          => "Você precisa informar um nome",
            'produtos.required'      => "Você precisa informar ao menos um produto",
        ];
    }
}
