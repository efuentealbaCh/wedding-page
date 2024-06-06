<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalos extends Model
{
    use HasFactory;
    protected $table = 'regalos';
    protected $primaryKey = 'rega_codigo';
    protected $fillable = [
        'rega_codigo',
        'rega_nombre',
        'rega_descripcion',
        'rega_estado',
        'rega_ruta_imagen',
        'rega_link',
        'usua_codigo'
    ];
}
