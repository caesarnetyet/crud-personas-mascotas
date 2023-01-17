<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{

    protected $fillable = [
        'nombre',
        'raza',
        'color',
        'sexo',
        'persona_id',
    ];
    use HasFactory;
    
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
