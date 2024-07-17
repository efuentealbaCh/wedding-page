<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regalos;

class GiftsController extends Controller
{
    public function index()
    {
        $regalos = Regalos::all();
        return view('gifts.gift', compact('regalos'));
    }

    public function reservar(Request $request)
    {
        $usuario = $request->usuario;
        $regalo = $request->regalo;
        $userAvaible = Regalos::where('usua_codigo', $usuario)->first();
        $giftAvaible = Regalos::where(['rega_estado' => '1', 'rega_codigo' => $regalo])
            ->first();
        if ($giftAvaible->rega_estado == 0) {
            return response()->json([
                'status' => 1,
                'msg' => 'El Regalo seleccionado ya se encuentra reservado.'
            ]);
        } else if ($userAvaible != null) {
            return response()->json([
                'status' => 1,
                'msg' => 'El usuario ya tiene una reserva de regalo, para cancelar reserva contactar al +569 21653786'
            ]);
        } else {
            Regalos::where('rega_codigo', $regalo)->update(['usua_codigo' => $usuario, 'rega_estado' => 0]);
            return response()->json(['status' => 0, 'msg' => 'Haz reservado tu regalo con exitó']);
        }
    }
}
