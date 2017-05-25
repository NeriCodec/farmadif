<?php

namespace App\Http\Controllers;

use App\Donador;
use App\Beneficiario;
use Illuminate\Http\Request;

class LoginWSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $usuario = $request->input('usuario');
        $contrasenia = $request->input('contrasenia');
        $tipo_usuario = $request->input('tipo_usuario');
        $token = $request->input('token');

        if($usuario == null || $contrasenia == null 
            || $token == null || $tipo_usuario == null) 
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
            if($tipo_usuario == 'Beneficiario')
            {
                $beneficiario = Beneficiario::BuscarBeneficiarioLogin(
                    $usuario,
                    $contrasenia
                );

                if($beneficiario == null) 
                {
                    return response()->json( 
                        [
                            "status" => "404",
                            "error" => "usuario no encontrado",
                        ] ,
                        404
                    );
                }

                $medicamentosDonados = Beneficiario::medicamentosDelBeneficiario($beneficiario[0]->id_beneficiario);
                $medicamentosRequeridos = Beneficiario::medicamentosRequeridosPorUnBeneficiarioId($beneficiario[0]->id_beneficiario);

                return response()->json( 
                    [
                        "status" => "200",
                        "id_beneficiario" => $beneficiario[0]->id_beneficiario,
                        "usuario" => $beneficiario[0]->usuario,
                        // "medicamento_donado" => $medicamentosDonados,
                        // "medicamento_requerido" => $medicamentosRequeridos
                    ] ,
                    200
                );
            } 
            else if ($tipo_usuario == 'Donador')
            {
                $donador = Donador::buscarDonadorLogin(
                    $usuario,
                    $contrasenia
                );

                if($donador == null) 
                {
                    return response()->json( 
                        [
                            "status" => "404",
                            "error" => "usuario no encontrado",
                        ] ,
                        404
                    );
                }

                return response()->json( 
                    [
                        "status" => "200",
                        "usuario" => $donador[0]->usuario,
                        // "medicamento_donado" => $medicamentosDonados,
                        // "medicamento_requerido" => $medicamentosRequeridos
                    ] ,
                    200
                );
            } 
            
            

            
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
