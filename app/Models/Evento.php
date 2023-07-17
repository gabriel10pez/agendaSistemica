<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = "events";

    static $rules = [
        'title' => 'required',
        'description' => 'required',
        'start' => 'required',
        'end' => 'required',
        'lugar_evento' => 'required',
        // 'fecha_evento' => 'required',
    ];

    protected $fillable = [
        'title',
        'description',
        'start',
        'end',
        'user_id',
        'status',
        'lugar_evento',
        'resolucion_evento',
        'costo_evento',
        'tipo_event_id',
    ];

    public function tipo_evento()
    {
        return $this->belongsTo(TipoEvento::class);
    }
}
