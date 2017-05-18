<?php

namespace App\Http\Controllers;


use App\Beneficiario;
use Illuminate\Http\Request;

class LoginBeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiarios = Beneficiario::all(
            ['only' => 'id_beneficiario', 'nombre', 'usuario' ]
        );

         if($beneficiarios == null)
        {
            return response()->json( 
                [
                    "error" => "Usuarios no encontrado",
                ] ,
                404
            );
        }

        return response()->json( 
            [
                "usuarios" => $beneficiarios
            ] ,
            200
        );
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $beneficiario = Beneficiario::find(
            $id, 
            [
                'only' => 'id_beneficiario', 'nombre', 'usuario' 
            ]
        );

        if($beneficiario == null)
        {
            return response()->json( 
                [
                    "error" => "Usuario no encontrado",
                ] ,
                404
            );
        }

        return response()->json( 
            [
                "nombre" => $beneficiario->nombre,
                "usuario" => $beneficiario->usuario
            ] ,
            200
        );
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
