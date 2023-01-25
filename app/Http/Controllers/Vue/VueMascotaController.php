<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VueMascotaController extends Controller
{
    function index(){
        return Inertia::render('Mascotas', [
            'mascotas' => Mascota::all()->map(function ($mascota){
                return [
                    'id' => $mascota->id,
                    'properties' => [
                        'nombre' => $mascota->name,
                        'raza' => $mascota->breed,
                        'color' => $mascota->color,
                        'dueño' => $mascota->persona->name,
                    ],
                    'actions' => [
                        'edit_url' => route('vue.persona.edit', ['persona' => $user]),
                        'delete_url' => route('vue.persona.delete', ['persona' => $user])
                    ],
                ];
            })
        ]);
    }
}
