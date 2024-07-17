<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listUsers(){
        $users = Usuarios::all();
        return view('admin.usuarios',compact('users'));
    }
}
