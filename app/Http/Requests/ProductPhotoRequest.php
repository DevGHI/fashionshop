<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPhotoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
