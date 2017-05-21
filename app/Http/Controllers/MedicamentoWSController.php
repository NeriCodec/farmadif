<?php

namespace App\Http\Controllers;

use App\Beneficiario;
use Illuminate\Http\Request;

class MedicamentoWSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tokenAutenticacion = "5c73ca7f-1ecf-417e-862c-7695614d18be";
        $idBeneficiario = $request->input('id_beneficiario');
        $token = $request->input('token');

        if($idBeneficiario == null || $token == null) 
        {
            return response()->json( 
                [
                    "status" => "400",
                    "error" => "datos no obtenidos",
                ] ,
                400
            );
        }

        if($tokenAutenticacion == $token) 
        {
            $medicamentosDonados = Beneficiario::medicamentosDelBeneficiario($idBeneficiario);
            $medicamentosRequeridos = Beneficiario::medicamentosRequeridosPorUnBeneficiarioId($idBeneficiario);

            return response()->json( 
                [
                    "status" => "200",
                    "medicamento_donado" => $medicamentosDonados,
                    "medicamento_requerido" => $medicamentosRequeridos
                ] ,
                200
            );
        }

        return response()->json( 
            [
                "status" => "401",
                "error" => "autenticacion fallida",
            ] ,
            401
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
