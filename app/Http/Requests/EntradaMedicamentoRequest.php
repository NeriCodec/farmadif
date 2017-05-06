<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaMedicamentoRequest extends FormRequest
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
            'idDonador' => 'required',
            'nombre_compuesto' => 'required',
            'nombre_comercial' => 'required',
            'nro_etiqueta' => 'required',
            'nro_folio' => 'required',
            'cantidad_re' => 'required',
            'fecha_caducidad' => 'required',
            'precentacion' => 'required',
            'medida' => 'required',
        ];
    }
}