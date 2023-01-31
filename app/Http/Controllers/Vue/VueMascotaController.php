<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use App\Models\Persona;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VueMascotaController extends Controller
{
    function index(){
        return Inertia::render('Mascotas', [
            'mascotas' => Mascota::query()
                ->when(request('search'), function ($query){
                    $query->where('name', 'like', '%'.request('search').'%');
                })
                ->get()->map(function ($mascota){
                return [
                    'id' => $mascota->id,
                    'properties' => [
                        'nombre' => $mascota->name,
                        'raza' => $mascota->breed,
                        'color' => $mascota->color,
                        'dueño' => $mascota->persona->name,
                    ],
                    'actions' => [
                        'edit_url' => route('vue.mascotas.edit', ['mascota' => $mascota]),
                        'delete_url' => route('vue.mascotas.delete', ['mascota' => $mascota])
                    ],
                ];
            })
                , 'current_url' => request()->fullUrl()]
        );
    }
    function create(){
        $personas = Persona::all(['id', 'name']);
        return Inertia::render('Mascotas/Create', ['personas' => $personas]);
    }

    function store(){
        $data = request()->validate([
            'name' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'sex' => 'required',
            'persona_id' => 'required'
        ]);
        Mascota::create($data);
        return redirect()->route('vue.mascotas', ['success' => 'Mascota agregada correctamente']);
    }
}
