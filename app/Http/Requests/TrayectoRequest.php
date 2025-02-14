<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrayectoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'origen' => 'required|string|max:255',
            'destino'=> 'required|string|max:255',
            'kms'=> 'required|int|max:10',
            'tiempo_aprox'=> 'required|string|max:255',
            'hora_salida'=> 'required|date_format:h:i A',
            'hora_llegada'=> 'required|date_format:h:i A',
            'fecha'=> 'required|date',
            'precio'=> 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [

        ];
    }
}
