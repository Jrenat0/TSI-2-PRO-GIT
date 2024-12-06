<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
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
            'fecha' => 'required|date|after:today', // Validar que sea una fecha válida
            'hora' => 'required|date_format:H:i', // Validar que sea una hora en formato H:i
            'hora_termino' => 'nullable|date_format:H:i|after:hora', // Validar que sea una hora válida y después de 'hora'
            'pesaje' => 'nullable|numeric|min:0', // Validar que sea un número no negativo
            'observaciones' => 'nullable|string|max:500', // Validar texto opcional con un máximo de 500 caracteres
            'estado' => 'required|string|in:P,T', // Validar que sea uno de los valores permitidos (P: Pendiente, E: En progreso, C: Completada)
            'id_mascota' => 'required|exists:mascotas,id', // Validar que exista en la tabla 'mascotas'
            'id_servicio' => ['required', 'array', 'min:1'],
            'id_servicio.*' => ['exists:servicios,id'],
        ];
    }

    /**
     * Mensajes de error personalizados.
     */
    public function messages(): array
    {
        return [
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser válida.',
            'fecha.after' => 'La fecha debe ser posterior al dia actual',
            'hora.required' => 'La hora de inicio es obligatoria.',
            'hora.date_format' => 'La hora debe tener el formato HH:mm.',
            'hora_termino.date_format' => 'La hora de término debe tener el formato HH:mm.',
            'hora_termino.after' => 'La hora de término debe ser posterior a la hora de inicio.',
            'pesaje.numeric' => 'El pesaje debe ser un número.',
            'observaciones.max' => 'Las observaciones no pueden tener más de 500 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser uno de los siguientes: P (Pendiente), T (Terminada).',
            'id_mascota.required' => 'La mascota es obligatoria.',
            'id_mascota.exists' => 'La mascota seleccionada no existe.',
            'id_servicio.required' => 'Debe seleccionar al menos un servicio.',
            'id_servicio.min' => 'Debe seleccionar al menos un servicio.',
            'id_servicio.*.exists' => 'El servicio seleccionado no es válido.',
        ];
    }
}
