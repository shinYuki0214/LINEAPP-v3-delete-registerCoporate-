<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => ['required'],
            'product_price' => ['required', 'integer', 'min:0'],
            'product_img' => ['file', 'mimes:jpeg,jpg,png',
                        'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'],
        ];
    }
}
