<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        $rules = ['email' => 'required|email'];

        if ($this->isMethod('put')) {
            $rules = [
                'password' => 'required|min:4',
                'password2' => 'required|min:4',
            ];
        }

        return $rules;
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
