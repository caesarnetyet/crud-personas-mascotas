<?php

namespace App\Http\Controllers\FullStack;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonasController extends Controller
{
    function index(){
        $personas = Persona::withCount('mascotas')->get();
        
        return view('welcome', ["clientes" => $personas]);
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
    
}
