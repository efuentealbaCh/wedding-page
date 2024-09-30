<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regalos;
use App\Models\Usuarios;

class GiftsController extends Controller
{
    public function index()
    {
        $regalos = Regalos::orderBy('rega_nombre','asc')->get();
        return view('gifts.gift', compact('regalos'));
    }

    public function reservar(Request $request)
    {
        $usuario = $request->usuario;
        $regalo = $request->regalo;
        $estado = $request->estado;
        $userAvaible = Regalos::select('rega_codigo')->where('usua_codigo', $usuario)->count();
        $giftAvaible = Regalos::where(['rega_estado' => '1', 'rega_codigo' => $regalo])
            ->first();
        $userState = Usuarios::where('usua_codigo', $usuario)->first();


        if ($estado == 'P') {
            return response()->json(['status' => 2, 'msg' => 'Aún no confirmas tu asistencia y no por lo tanto no puedes seleccionar tu regalo, ¿quieres confirmar tu asistencia?']);
        } else if ($estado == 'N') {
            return response()->json(['status' => 2, 'msg' => 'Entendemos que no puedas asistir a nuestra boda y que no puedas enviar un regalo, estamos agradecidos por haber echo lo posible, gracias.']);
        } else if ($giftAvaible->rega_estado == 0) {
            return response()->json([
                'status' => 1,
                'msg' => 'El Regalo seleccionado ya se encuentra reservado.'
            ]);
        } else if ($userAvaible > 0) {
            return response()->json([
                'status' => 1,
                'msg' => 'El usuario ya tiene una reserva de regalo, para cancelar reserva contactar al +569 21653786'
            ]);
        } else {
            Regalos::where('rega_codigo', $regalo)->update(['usua_codigo' => $usuario, 'rega_estado' => 0]);
            return response()->json(['status' => 0, 'msg' => 'Haz reservado tu regalo con exitó']);
        }
    }

    public function confirmarAsistencia(Request $request)
    {
        $asistencia = $request->usua_asistencia;
        $usuario = $request->usua_codigo;

        $actualizado = Usuarios::where('usua_codigo', $usuario)->update(['usua_asistencia' => $asistencia]);

        if ($actualizado) {
            session()->put('invitado.usua_asistencia', $asistencia);
            session()->put('invitado.usua_codigo', $usuario);
            session()->save();
            return response()->json(['status' => 1, 'msg' => 'Tu estado de asistencia fue actualizado']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Error al cambiar tu estado de asistencia, comunicate al +56921653786']);
        }
    }
}
