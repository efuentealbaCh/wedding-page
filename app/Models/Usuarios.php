<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'usua_codigo';
    protected $fillable = [
        'usua_codigo',
        'usua_nombre',
        'usua_apellido',
        'usua_nombre_usuario',
        'usua_contrasena',
        'usua_asistencia',
        'usua_valido',
        'usua_rol'
    ];
}
