<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        // Definimos las reglas comunes
        $rules = [
            'nombre' => 'required|string|regex:/^[\pL\s]+$/u|min:2|max:20',
            'raza' => 'required|string|regex:/^[\pL\s]+$/u|min:3|max:50',
            'sexo' => 'required|string|alpha|in:M,H,m,h|max:1',
            'color' => 'required|string|regex:/^[\pL\s]+$/u|min:3|max:50',
            'peso' => 'required|numeric|min:0.1|max:999.99',
            'fecha_nacimiento' => 'required|date|before:today',
            // 'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        // Reglas adicionales para el store
        if ($this->isMethod('post')) {
            $rules['rut_cliente'] = 'required|string|alpha_dash|min:9|max:10';
            $rules['imagen'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        return $rules;
    }
    public function messages()
    {
        return [
            // Nombre
            'nombre.required' => 'El nombre de la mascota es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'nombre.min' => 'El nombre debe contener minimo 2 caracteres',
            'nombre.max' => 'El nombre debe contener como maximo 20 caracteres',
            // Raza
            'raza.required' => 'La raza de la mascota es obligatoria.',
            'raza.string' => 'La raza de la mascota debe ser una cadena de texto.',
            'raza.regex' => 'La raza solo puede contener letras y espacios.',
            'raza.min' => 'La raza debe contener minimo 3 caracteres.',
            'raza.max' => 'La raza debe contener como maximo 50 caracteres.',
            // Sexo
            'sexo.required' => 'El sexo de la mascota es obligatorio.',
            'sexo.string' => 'El sexo debe ser una cadena de texto.',
            'sexo.alpha' => 'El sexo solo puede contener letras.',
            'sexo.size' => 'El sexo debe contener solo 1 caracter.',
            'sexo.in' => 'El sexo debe ser "M" O "H".',
            // Color
            'color.required' => 'El color de la mascota es obligatorio.',
            'color.string' => 'El color de la mascota debe ser una cadena de texto.',
            'color.regex' => 'El color de la mascota solo puede contener letras y espacios.',
            'color.min' => 'El color de la mascota debe contener minimo 3 caracteres.',
            'color.max' => 'El color de la mascota debe contener como maximo 50 caracteres.',
            // Peso
            'peso.required' => 'El peso de la mascota es obligatorio.',
            'peso.numeric' => 'El peso de la mascota debe ser un numero.',
            'peso.min' => 'El peso de la mascota debe ser mayor o igual a 0.1 kg.',
            'peso.max' => 'El peso de la mascota debe ser menor o igual a 999 kg.',
            // Fecha de nacimiento
            'fecha_nacimiento.required' => 'La fecha de nacimiento de la mascota es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento de la mascota debe ser una fecha valida.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento de la mascota debe ser anterior a hoy.',
            // Rut del cliente
            'rut_cliente.required' => 'El rut del dueño de la mascota es obligatorio.',
            'rut_cliente.string' => 'El rut del dueño de la mascota debe ser una cadena de texto.',
            'rut_cliente.alpha_dash' => 'El rut del dueño de la mascota solo puede contener letras, numeros y guiones.',
            'rut_cliente.min' => 'El rut del dueño de la mascota debe contener como minimo 9 caracteres.',
            'rut_cliente.max' => 'El rut del dueño de la mascota debe contener como maximo 10 caracteres.',
            //
            'imagen.image' => 'El archivo debe ser una imagen.',
            'imagen.mimes' => 'La imagen debe ser un archivo tipo: jpeg, png, jpg, gif.',
            'imagen.max' => 'La imagen no debe ser mayor de 2MB.',
        ];
    }
}
