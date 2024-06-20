<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regalos;

class GiftsController extends Controller
{
    public function index() {
        $regalos = Regalos::all();
        return view('gifts.gift',compact('regalos'));
    }

    public function confirmarAsistencia(){
        return view('gifts.asistencia');
    }
}
