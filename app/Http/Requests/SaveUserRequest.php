<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'name'        => 'required|max:255',
            'email'       => 'required|email|max:255|unique:users,email,'.$this->user,
            'role'        => 'required|numeric|min:1|max:3',
            'empleado_id' => 'required|max:10',
            'password'    => 'min:8',
        ];
    }
}
