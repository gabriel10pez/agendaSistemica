<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $table = "incidencias";
    
    // protected $fillable = ['titulo_incidencia', 'descripcion', 'fecha_incidencia', 'foto_incidencia', 'user_id'];
    
    static $rules = [
        'titulo_incidencia' => 'required',
        'descripcion' => 'required',
        'fecha_incidencia' => 'required',
        'foto_incidencia' => 'required',
        'user_id' => 'required',
        'created_at',
        'updated_at'
        // 'fecha_evento' => 'required',
    ];

}
