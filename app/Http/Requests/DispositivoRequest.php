<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DispositivoRequest extends Request
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
            'codigo' => 'required|unique:dispositivo,codigo|max:255',
            'descripcion' => 'required|max:255'
        ];
    }

    /* mensajes particulares
    public function messages()
    {
        return [
            'codigo.required' => 'Codigo Requerido',
            'codigo.unique' => 'Codigo Duplicado'
        ];
    }
    */
}