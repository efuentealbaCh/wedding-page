<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function saveUser(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'username' => 'required',
            'contrasena' => 'required',
        ], [
            'nombre.required' => 'El nombre del invitado es requerido.',
            'apellido.required' => 'El apellido del invitado es requerido.',
            'username.required' => 'Se debe asignar un nombre de usuario.',
            'contrasena.required' => 'Se debe de crear una contraseña para el invitado',
        ]);

        $nuevoInvitado = new Usuarios();
        $nuevoInvitado->usua_nombre = $request->nombre;
        $nuevoInvitado->usua_apellido = $request->apellido;
        $nuevoInvitado->usua_nombre_usuario = $request->username;
        $nuevoInvitado->usua_contrasena = Hash::make($request->contrasena);
        $nuevoInvitado->usua_asistencia = 'P';
        $nuevoInvitado->usua_valido = $request->vale;
        $nuevoInvitado->usua_rol = 'invitado';
        $nuevoInvitado->save();

        return redirect()->route('index.regalos');
    }
}
