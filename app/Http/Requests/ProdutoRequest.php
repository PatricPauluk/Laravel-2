<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// As regras de validação do produto são isoladas dentro de ProdutoRequest. Para isso serve um Form Request.
class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Retorna se pode ou não realizar o request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Regras de validação para o request
        return [
            'nome' => 'required|min:3', // Obrigatório, minimo 3 caracteres
            'descricao' => 'required|max:255', // Obrigatório, máximo 255 caracteres
            'valor' => 'required|numeric', // Obrigatório, o valor deve ser um número
            'quantidade' => 'required|numeric', // Obrigatório, o valor deve ser um número
            'tamanho' => 'required|max:100' // Obrigatório, máximo 100 caracteres
        ];
    }
    
    // Função para mensagens de erro personalizadas
    public function messages(){
        return [ // A escrita :attribute exibe o nome do atributo para o usuário dentro da mensagem.
            'required' => 'O :attribute é obrigatório.', 
            'numeric' => 'O :attribute deve ser apenas números.'
        ];
    }
}
