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
                , 'current_url' => request()->fullUrl()
                , 'clientes' => Persona::all(['id', 'name']), 'success' => request('success')]
        );
    }
    function create(Request $request){
        $personas = Persona::all(['id', 'name']);
        $persona = persona::find($request->cliente_id, ['id', 'name']);

        return Inertia::render('Mascotas/Create', ['personas' => $personas, 'persona' => $persona]);
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

    function delete(Mascota $mascota){
        $mascota = Mascota::find($mascota->id);
        $mascota->delete();
        return redirect()->route('vue.mascotas', ['success' => 'Mascota eliminada correctamente']);
    }

    function edit(Mascota $mascota){
        $mascota = Mascota::find($mascota->id);

        return Inertia::render('Mascotas/Edit', ['mascota' => $mascota]);
    }
    function update(Mascota $mascota){
        $mascota = Mascota::find($mascota->id);
        $data = request()->validate([
            'name'=> 'required',
            'breed' => 'required',
            'color' => 'required',
            'sex'=> 'required',
        ]);
        $mascota->update($data);
        return redirect()->route('vue.mascotas', ['success' => 'Mascota actualizada correctamente']);
    }

}
