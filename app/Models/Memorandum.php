<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memorandum extends Model
{
    use HasFactory;

    protected $table = "memoranda";

    protected $fillable = [
        'numero_memorandum',
        'anio_memorandum',
        'remitente_memorandum',
        'asunto_memorandum',
        'cuerpo_memorandum',
        'created_at',
        'updated_at',
        'event_id',
    ];
}
