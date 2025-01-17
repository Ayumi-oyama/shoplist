<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名称',
        ];
    }
}
