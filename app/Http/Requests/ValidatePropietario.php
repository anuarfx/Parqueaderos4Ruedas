<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePropietario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:60',
            'apellido' => 'required|max:60',
            'cedula' => 'required|digits:20',
            'telefono' => 'required|digits:20',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El Nombre es Obligatorio',
            'apellido.required' => 'El Apellido es Obligatorio',
            'cedula.required' => 'La Cedula es Obligatoria',
            'telefono.required' => 'El Telefono es Obligatorio',
        ];
    }
}
