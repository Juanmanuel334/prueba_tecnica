<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecioRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'precio'=> 'required|string|max:255'
        ];
    }
}
