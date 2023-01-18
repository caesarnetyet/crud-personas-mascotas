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
            'users' => Persona::all()->map(function ($user){
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'edit_url' => route('vue.persona.edit', $user),
                    'delete_url' => route('vue.persona.delete', $user),
                ];
            })
        ]);
    }
}
