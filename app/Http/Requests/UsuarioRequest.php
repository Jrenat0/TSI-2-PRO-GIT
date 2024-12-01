<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|min:3|max:60',
            'email' => 'required|email|unique:usuarios,email|max:255',
            'fono' => 'required|string|regex:/^\d{9}$/',
            'rol' => 'required|string|in:Peluquero,Secretario,Administrador',
        ];

        if ($this->isMethod('post')) {
            $rules['rut'] = 'required|string|alpha_dash|min:9|max:10';
            $rules['password'] ='required|min:4';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del cliente es obligatorio.',
            'nombre.string' => 'El nombre del cliente debe ser una cadena de texto.',
            'nombre.regex' => 'El nombre del cliente solo puede contener letras y espacios.',
            'nombre.min' => 'El nombre del cliente debe contener minimo 2 caracteres',
            'nombre.max' => 'El nombre del cliente debe contener como maximo 20 caracteres',

            'email.required' => 'El email del usuario es obligatorio.',
            'email.email' => 'El email ingresado no cumple con el formato de un email.',
            'email.unique' => 'El email ingresado ya se encuentra registrado!',
            'email.max' => 'El email ingresado supera la cantidad maxima de caracteres(:max caracteres).',

            'rut.required' => 'El rut del usuario es obligatorio.',
            'rut.string' => 'El rut del usuario debe ser una cadena de texto.',
            'rut.alpha_dash' => 'El rut del usuario solo puede contener letras, numeros y guiones.',
            'rut.min' => 'El rut del usuario debe contener como minimo :min caracteres.',
            'rut.max' => 'El rut del usuario debe contener como maximo :max caracteres.',

            'password.required' => 'El campo de la contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres.',

            'fono.required' => 'El numero telefonico del cliente es obligatorio.',
            'fono.string' => 'El numero telefonico del cliente debe corresponder a una cadena de texto.',
            'fono.regex' => 'El numero telefonico del cliente no cumple con el formato de un numero de telefono.',

            'rol.required' => 'El campo rol es obligatorio.',
            'rol.string' => 'El rol debe ser una cadena de texto válida.',
            'rol.in' => 'El rol debe ser uno de los siguientes: Peluquero, Secretario o Administrador.',
        ];

    }
}
