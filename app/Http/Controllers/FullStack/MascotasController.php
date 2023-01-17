<?php

namespace App\Http\Controllers\FullStack;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MascotasController extends Controller
{
    function index(Request $request){
        if($request->cliente != null)
            return view('pets.form', ["cliente" => $request->cliente]);
        $personas = Persona::all();
        if (count($personas) == 0)
            return redirect()->route('/cliente/agregar')
                             ->withErrors(['clientes' =>'Para registrar una mascota, 
                             primero debe registrar un cliente']);
        
        return view('pets.form', ["clientes" => $personas]);
    }
    function create(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'sex' => 'required',
        ]);
        if($validate->fails()){
            
            return redirect()->route('/mascota/agregar')->withErrors($validate->errors());
        }
        $cliente = Persona::find($request->cliente);
        $mascota = new Mascota();
        
        $mascota->name = $request->name;
        $mascota->breed = $request->breed;
        $mascota->color = $request->color;
        $mascota->sex = $request->sex;
        $cliente->mascotas()->save($mascota);
        return redirect()->route('/');
    }
}
