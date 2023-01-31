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
            'clientes' => Persona::query()
                            ->when(request('search'), function ($query){
                                $query->where('name', 'like', '%'.request('search').'%');
                            })
                            ->withCount('mascotas')->get()->map(function ($user){
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
        , 'current_url' => request()->fullUrl(), 'success' => request('success')]);
    }
    function create(){
        return Inertia::render('Cliente/Create');
    }

    function delete(Persona $persona){
        $persona = Persona::find($persona->id);
        $persona->delete();
        return redirect()->route('vue', ['success' => 'Cliente eliminado correctamente']);
    }
    function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        Persona::create($data);
        return redirect()->route('vue', ['success' => 'Cliente agregado correctamente']);
    }

    function edit(Persona $persona){
        $persona = Persona::find($persona->id);
        return Inertia::render('Cliente/Edit', ['persona' => $persona]);
    }

    function update(Persona $persona){
        $persona = Persona::find($persona->id);
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        $persona->update($data);
        return redirect()->route('vue', ['success' => 'Cliente actualizado correctamente']);
    }
}
