<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveClienteRequest extends FormRequest
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
            'nombre'    => 'required|max:255',
            'apellido'  => 'required|max:255',
            'email'     => 'required|email|max:255',
            'direccion' => 'required|max:255',
            'telefono'  => 'required|max:255',
            'celular'   => 'required|max:255',
            'tipo_doc'  => 'required|max:255',
            'doc' => 'required|max:255',
            'licencia'  => 'required|max:255',
        ];
    }
}
