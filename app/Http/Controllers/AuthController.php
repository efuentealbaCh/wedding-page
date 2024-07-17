<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginValidate(Request $request)
{
    try {
        $validacion = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'contrasena' => 'required',
            ],
            [
                'username.required' => 'El nombre de usuario es requerido.',
                'contrasena.required' => 'La contraseña es requerida.',
            ]
        );

        if ($validacion->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validacion->errors()->first()
            ], 422);
        }

        $usuario = Usuarios::where(['usua_nombre_usuario' => $request->username])->first();

        if ($usuario == null)
            return response()->json(['success' => false, 'message' => 'El usuario no existe, o no se encuentra registrado'], 404);

        $validarClave = Hash::check($request->contrasena, $usuario->usua_contrasena);

        if (!$validarClave)
            return response()->json(['success' => false, 'message' => 'La contraseña es incorrecta'], 401);

        if ($usuario->usua_rol == 'admin') {
            $request->session()->put('admin', $usuario);
            return response()->json(['success' => true, 'redirect_url' => route('index.regalos')]);
        } elseif ($usuario->usua_rol == 'invitado') {
            $request->session()->put('invitado', $usuario);
            return response()->json(['success' => true, 'redirect_url' => route('index.regalos')]);
        }
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Ha ocurrido un error en el servidor',
            'error' => $e->getMessage()
        ], 500);
    }
}


    public function logout(Request $request)
    {
        try {
            if ($request->session()->has('admin')) {
                $request->session()->forget('admin');
                $role = 'admin';
            } elseif ($request->session()->has('invitado')) {
                $request->session()->forget('invitado');
                $role = 'invitado';
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No hay sesión activa'
                ], 401);
            }

            // Invalidar la sesión actual
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('index.login.view');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ha ocurrido un error al cerrar la sesión',
                'error' => $e->getMessage()
            ], 500);
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

        if ($validacion->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validacion->errors()->first()
            ], 422);
        }
        $codigo = Usuarios::max('usua_codigo') + 1;
        $nuevoInvitado = new Usuarios();
        $nuevoInvitado->usua_codigo = $codigo;
        $nuevoInvitado->usua_nombre = $request->nombre;
        $nuevoInvitado->usua_apellido = $request->apellido;
        $nuevoInvitado->usua_nombre_usuario = $request->username;
        $nuevoInvitado->usua_contrasena = Hash::make($request->contrasena);
        $nuevoInvitado->usua_asistencia = 'P';
        $nuevoInvitado->usua_valido = $request->vale;
        $nuevoInvitado->usua_rol = 'invitado';
        $nuevoInvitado->save();

        return response()->json([
            'success' => true,
            'message' => 'El usuario ha sido insertado correctamente.'
        ]);
    }
}
