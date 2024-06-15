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

    public function validarIngreso(Request $request) {
        $request->validate(
            [
                'username' => 'required',
                'contrasena' => 'required',
            ],
            [
                'username.required' => 'El nombre de usuario es requerido.',
                'contrasena.required' => 'La contraseña es requerida.',
            ]
        );

        $usuario = Usuarios::where(['usua_nombre_usuario' => $request->username])->first();

        if ($usuario == NULL) return redirect()->back()->with('errorName', 'El usuario no se encuentra registrado.')->withInput();

        $validarClave = Hash::check($request->contrasena, $usuario->usua_contrasena);

        if (!$validarClave) return redirect()->back()->with('errorClave', 'La contraseña es incorrecta.')->withInput();

        if ($usuario->usua_rol == 'admin') {
            $request->session()->put('admin', $usuario);
            return redirect()->route('index.regalos');
        } elseif ($usuario->usua_rol == 'invitado') {
            $request->session()->put('invitado', $usuario);
            return redirect()->route('index.regalos');
        }
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
