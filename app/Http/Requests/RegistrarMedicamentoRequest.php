<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarMedicamentoRequest extends FormRequest
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
            'nombre_compuesto' => 'required',
            'nombre_comercial' => 'required',
            'nro_etiqueta' => 'required',
            'nro_folio' => 'required',
            'cantidad_re' => 'required',
            'mes_caducidad' => 'required',
            'anio_caducidad' => 'required',
            'idDonador' => 'required',
            'precentacion' => 'required',
            'medida' => 'required',
        ];
    }

    // 
}