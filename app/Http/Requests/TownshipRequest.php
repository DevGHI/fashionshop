<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TownshipRequest extends FormRequest
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
