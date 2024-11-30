<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'rut' => 'required|string|alpha_dash|min:9|max:10',
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|min:3|max:50',
            'fono' => 'required|string|regex:/^\d{9}$/',
            'email' => 'required|email|unique:usuarios,email|max:255',
            'direccion' => 'required|string|regex:/^[\pL\pN\s,.#-]+$/u|min:3|max:50',
        ];
    }

    public function messages()
    {
        return [

            'rut.required' => 'El rut del cliente es obligatorio.',
            'rut.string' => 'El rut del cliente debe ser una cadena de texto.',
            'rut.alpha_dash' => 'El rut del cliente solo puede contener letras, numeros y guiones.',
            'rut.min' => 'El rut del cliente debe contener como minimo 9 caracteres.',
            'rut.max' => 'El rut del cliente debe contener como maximo 10 caracteres.',

            // Nombre
            'nombre.required' => 'El nombre del cliente es obligatorio.',
            'nombre.string' => 'El nombre del cliente debe ser una cadena de texto.',
            'nombre.regex' => 'El nombre del cliente solo puede contener letras y espacios.',
            'nombre.min' => 'El nombre del cliente debe contener minimo 2 caracteres',
            'nombre.max' => 'El nombre del cliente debe contener como maximo 20 caracteres',
            
            'fono.required' => 'El numero telefonico del cliente es obligatorio.',
            'fono.string' => 'El numero telefonico del cliente debe corresponder a una cadena de texto.',
            'fono.regex' => 'El numero telefonico del cliente no cumple con el formato de un numero de telefono.',

            'email.required' => 'El email del cliente es obligatorio.',
            'email.email' => 'El email ingresado no cumple con el formato de un email.',
            'email.unique' => 'El email ingresado ya se encuentra registrado!.',
            'email.max' => 'El email ingresado supera la cantidad maxima de caracteres(:max caracteres).',

            'direccion.required' => 'La direccion del cliente es obligatoria.',
            'direccion.string'=> 'La direccion ingresada debe ser una cadena de texto.',
            'direccion.regex'=> 'La direccion ingresada no cumple con el formato de una direccion.',
            'direccion.min'=> 'La direccion ingresada no tiene la cantidad minima de caracteres(:min caracteres)',
            'direccion.max'=> 'La direccion ingresada supera la cantidad maxima de caracteres(:max caracteres)',

        ];
    }

}
