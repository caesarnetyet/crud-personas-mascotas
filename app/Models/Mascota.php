<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';

    protected $fillable = [
        'nombre',
        'raza',
        'color',
        'sexo',
        'persona_id',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
