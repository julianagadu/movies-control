<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmesFormRequest extends FormRequest
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
            'titulo' =>'required|min:3',
            'anoLancamento' => 'required|numeric',
            'duracao' => 'required',
            'descricao' => 'required'
            
        ];
    }

    public function messages(){
        return[
            'titulo.min' => 'O título precisa ter pelo menos três caracteres',
            'required'=>'O campo :attribute é obrigatório!',
            'anoLancamento.numeric' => 'Ano de Lançamento precisa ser 4 números',
        ];
    }
}
