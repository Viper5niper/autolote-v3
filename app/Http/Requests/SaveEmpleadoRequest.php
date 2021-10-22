<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEmpleadoRequest extends FormRequest
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
            'nombre'    => 'required|max:75',
            'apellido'  => 'required|max:75',
            'doc'       => 'required|max:20|unique:empleados,doc,'.$this->empleado,
            'direccion' => 'required|max:200',
            'telefono'  => 'max:20',
            'celular'   => 'max:20',
            'nit'       => 'max:20',
            'licencia'  => 'max:1',
            'isss'      => 'max:20',
            'nup'       => 'max:20',
            'profesion' => 'required|max:75',
            'area_empresa' => 'required|max:100',
            'cargo'     => 'required|max:100',
        ];
    }
}
