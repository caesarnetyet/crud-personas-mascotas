<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Models\Persona;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VuePersonaController extends Controller
{
    //
    function index(){
        return Inertia::render('Bienvenido', [
            'clientes' => Persona::withCount('mascotas')->get()->map(function ($user){
                return [
                    'id' => $user->id,
                    'properties' => [
                        'nombre' => $user->name,
                        'email' => $user->email,
                        'telefono' => $user->phone,
                        'numero_mascotas' => $user->mascotas_count
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
