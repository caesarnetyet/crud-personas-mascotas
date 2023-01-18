<?php

namespace App\Http\Controllers\FullStack;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonasController extends Controller

{

    function index(Request $request){
        $personas = Persona::withCount('mascotas')->get();
        $persona = Persona::find($request->persona);
        if ($persona != null)
            return view('welcome', ["personas" => $personas, "persona" => $persona]);
        return view('welcome', ["clientes" => $personas, "persona" => null]);
    }

    function update_view($persona_id){
        $persona = Persona::findOrFail($persona_id);
        return view('person.editar', ["cliente" => $persona]);
    }



    function update(Request $request){

        $persona = Persona::findOrFail($request->persona_id);
        $validate = Validator::make($request->all(), [
            'name' => 'string',
            'phone' => 'numeric',
            'email' => 'string',

        ]);


        foreach($validate->validated() as $key => $value){
            $persona->$key = $value;
        }
        $persona->save();
        return redirect()->route('/');
    }


    function create(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric | digits_between:7,10',
        ]);

        if($validate->fails()){

            return redirect()->route('/cliente/agregar')->withErrors($validate->errors());
        }

        $persona = new Persona();
        $persona->name = $request->name;
        $persona->email = $request->email;
        $persona->phone = $request->phone;
        $persona->save();
        return redirect()->route('/');
    }

    function delete($persona_id){
        $persona = Persona::find($persona_id);
        $persona->delete();
        return redirect()->route('/');
    }
}
