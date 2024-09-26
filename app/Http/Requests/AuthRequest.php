<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El campo de email es obligatorio.',
            'email.email' => 'Debes ingresar un email valido.',
            'password.required' => 'El campo de la contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres.',
        ];
    }
}
