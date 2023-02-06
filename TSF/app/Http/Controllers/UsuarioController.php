<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tsf.crearU');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|max:50',
            'pswd' => 'required|max:30',
        ]);
        if(Usuario::where('usuario','=', $request->usuario)->exists()){
            return redirect()->action([UsuariosController::class, 'create'])->with('error', 'Erabiltzailea existitzen da.');
        }
        $usu = new Usuario();
        $usu->usuario = $request->usuario;
        $usu->pswd = bcrypt($request->pswd);
        $usu->rol = 'usuario';
        $usu->save();
        return redirect()->action([TsfController::class, 'index']);
    }

    public function loginForm() 
    {
        return view('Tsf.loginForm');
    }

    public function logSes(Request $request)
    {
        $usuarios = Usuario::where('usuario','=',$request->usuario)->get();

        foreach($usuarios as $usu){
            if(Hash::check($request->pswd, $usu->pswd)){
                session(['usuario' => $usu]);

                return redirect()->action([TsfController::class, 'index']);
            }   
        }

        $error = 'El usuario: ' . $request->usuario . ', es incorrecto o la contraseña no coincide';
        return view('Tsf.log-reg', compact('error'));
    }

    public function cerrarSes(){

        session()->forget('usuario');
        return redirect()->action([TsfController::class, 'index']);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
