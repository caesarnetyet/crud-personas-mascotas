<?php

namespace App\Http\Controllers\FullStack;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MascotasController extends Controller
{
    function update_view($persona_id){
        $mascota = Mascota::findOrFail($persona_id);
        return view('pets.editar', ["mascota" => $mascota]);
    }
    function update(Request $request){
        $mascota = Mascota::findOrFail($request->mascota_id);
        $validate = Validator::make($request->all(), [
            'name' => 'string',
            'breed' => 'string',
            'color' => 'string',
        ]);

        foreach($validate->validated() as $key => $value){
            $mascota->$key = $value;
        }
        $mascota->save();
        return redirect()->route("pets.show", ["persona_id" => $mascota->persona_id]);
    }


    function index(Request $request){

        if($request->cliente != null){
            $persona = Persona::find($request->cliente);
            return view('pets.form', ["cliente" => $persona]);
        }
        $personas = Persona::all();

        if (count($personas) == 0)
            return redirect()->route('/')->withErrors(["notFound"=>"Para agregar una mascota, debes de registrar un cliente"]);

        return view('pets.form', ["clientes" => $personas]);
    }

    function mostrar($persona_id){
        $mascotas = Mascota::where('persona_id', $persona_id)->get();
        return view('pets/list', ["mascotas" => $mascotas]);
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

    function delete($mascota_id){
        $mascota = Mascota::findOrFail($mascota_id);
        $mascota->delete();
        return back();
    }
}
