<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public function acta(){
        return $this->hasOne(Acta::class);
    }

    public function asistente(){
        return $this->hasMany(Asistente::class);
    }

    public function memorandum(){
        return $this->hasOne(Memorandum::class);
    }
}
