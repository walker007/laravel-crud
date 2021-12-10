<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'marca_id'      => "required",
            'nome'          => "required",
            'preco'         => "required",
            'quantidade'    => "required",
        ];
    }

    public function messages()
    {
        return [
            'marca_id.required'      => "Você precisa informar a marca do produto",
            'nome.required'          => "Você precisa informar o nome do produto",
            'preco.required'         => "Você precisa informar o preço do produto",
            'quantidade.required'    => "Você precisa informar a quantidade do produto",
        ];
    }
}
