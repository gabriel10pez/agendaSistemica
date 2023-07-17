<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;

    protected $table = "actas";

    protected $fillable = [
        'numero_acta',
        'cuerpo_acta',
        'created_at',
        'updated_at',
        'event_id',
    ];
}
