<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'numeric|required',
            'status' => 'in:in_stock,out_of_stock'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'description.required'  => 'The description field is required',
            'price.numeric' => 'Price must be a valid number',
            'price.required' => 'The price field is required'
        ];
    }
}
