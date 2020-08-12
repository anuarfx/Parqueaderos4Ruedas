<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateVehiculo extends FormRequest
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
            'placa' => 'required|max:60',
            'marca' => 'required|max:60',
            'tipo' => 'required|max:60|in:Motocicleta,Automovil',
            'modelo' => 'required|numeric|digits:4',
            'nombre' => 'required|max:60',
            'apellido' => 'required|max:60',
            'cedula' => 'required|numeric|digits_between:4,20',
            'telefono' => 'required|numeric|digits_between:3,20',
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
            'placa.required' => 'La Placa es Obligatoria',
            'marca.required' => 'La Marca es Obligatorio',
            'tipo.required' => 'El Tipo de Vehiculo es Obligatoria',
            'modelo.required' => 'El Modelo del Vehiculo es Obligatorio',
            'nombre.required' => 'El Nombre es Obligatorio',
            'apellido.required' => 'El Apellido es Obligatorio',
            'cedula.required' => 'La Cedula es Obligatoria',
            'telefono.required' => 'El Telefono es Obligatorio',
        ];
    }
}
