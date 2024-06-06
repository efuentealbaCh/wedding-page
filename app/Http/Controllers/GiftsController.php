<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regalos;

class GiftsController extends Controller
{
    function index() {
        $regalos = Regalos::all();
        return view('gifts.gift',compact('regalos'));
    }
}
