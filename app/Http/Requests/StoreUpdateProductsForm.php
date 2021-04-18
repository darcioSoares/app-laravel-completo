<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductsForm extends FormRequest
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
        //'category_id'  =>'required|exists:categories,id'
        // estou mandando verificar se existe essa coluna category_id
        //na tabela category com nome ID

        $id = $this->segment(3);
        return [
            'name'     => "required|min:3|max:60|unique:products,name,{$id}",
            'url'     => "required|min:3|max:60|unique:products,url,{$id}",
            'price'     => 'required|min:3|max:10',
            'description'     => 'max:200',
            'category_id'  =>'required|exists:categories,id'
        ];
    }
}
