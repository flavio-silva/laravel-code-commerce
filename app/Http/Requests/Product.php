<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class Product extends Request
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
            'name' => 'required|min:2|max:80',
            'description' => 'required|min:5|max:1024',
            'price' => 'required|numeric',
            'featured' => 'boolean',
            'recommend' => 'boolean'
        ];
    }
}
