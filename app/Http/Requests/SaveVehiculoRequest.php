<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveVehiculoRequest extends FormRequest
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
            'placa'     => 'required|max:8',
            'vto'       => 'required|max:8',
            'marca'     => 'required|max:50',
            'modelo'    => 'required|max:50',
            'color'     => 'required|max:100',
            'anio'      => 'required|max:4',
            'capacidad' => 'required|max:10',
            'clase'     => 'required|max:60',
            'traccion'  => 'required|max:8',
            'tipo'      => 'required|max:60',
            'dominio'   => 'required|max:40',
            'n_motor'   => 'required|max:25',
            'n_chasis'  => 'required|max:25',
            'n_vin'     => 'required|max:25',
            'calidad'   => 'required|max:40',
            'n_pol_s'   => 'max:40',
            'v_pol_s'   => 'max:8'
        ];
    }
}
