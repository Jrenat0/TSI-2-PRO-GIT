<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|min:2|max:20',
            'descripcion' => 'string|regex:/^[\pL\s]+$/u|min:2|max:100',
            'duracion_estimada' => 'required|numeric|min:1|max:360',
            'costo' => 'required|numeric|min:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'=> 'El nombre del servicio es obligatorio.',
            'nombre.string'=> 'El nombre ingresado no es una cadena de texto.',
            'nombre.regex'=> 'El nombre ingresado debe contener solo letras y espacios.',
            'nombre.min'=> 'El nombre ingresado debe superar los :min caracteres.',
            'nombre.max'=> 'El nombre ingresado supera el limite maximo de caracteres: :max caracteres.',
            'descripcion.string'=> 'La descripcion ingresada no es una cadena de texto.',
            'descripcion.regex'=> 'La descripcion ingresada debe contener solo letras y espacios.',
            'descripcion.min'=> 'La descripcion ingresada debe superar los :min caracteres.',
            'descripcion.max'=> 'La descripcion ingresada supera el limite maximo de caracteres: :max caracteres.',
            'duracion_estimada.required'=> 'La duracion estimada es obligatoria',
            'duracion_estimada.numeric'=> 'La duracion ingresada debe contener solo numeros.',
            'duracion_estimada.min'=> 'La duracion ingresada debe superar los :min caracteres.',
            'duracion_estimada.max'=> 'La duracion ingresada supera el limite maximo de caracteres: :max caracteres.',
            'costo.required' => 'El costo del servicio es obligatorio.',
            'costo.numeric' => 'El costo ingresado debe contener solo numeros.',
            'costo.min' => 'El costo ingresado debe superar los :min como minimo.',
        ];

    }

}
