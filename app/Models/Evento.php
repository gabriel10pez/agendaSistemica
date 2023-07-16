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
        'descripcion' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    protected $fillable = ['title', 'descripcion', 'start', 'end'];
}
