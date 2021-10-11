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
            'placa' => 'required',
            'vto' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'anio' => 'required|numeric',
            'capacidad' => 'required',
            'clase' => 'required',
            'traccion' => 'required',
            'tipo' => 'required',
            'dominio' => 'required',
            'n_motor' => 'required',
            'n_chasis' => 'required',
            'n_vin' => 'required',
            'calidad' => 'required',
            'n_pol_s' => 'required',
            'v_pol_s' => 'required'
        ];
    }
}
