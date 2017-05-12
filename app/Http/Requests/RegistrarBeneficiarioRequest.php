<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarBeneficiarioRequest extends FormRequest
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
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'dia' => 'required',
            'mes' => 'required',
            'anio' => 'required',
            'domicilio' => 'required',
            'comunidad' => 'required',
            'fotografia' => 'required|image',
            'identificacion' => 'required|image'
        ];
    }
}
