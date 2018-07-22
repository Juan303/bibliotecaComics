<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{
    public function index(){
        return view('libraries.create');
    }
    

    public function store(Request $request){

        //dd($request->all()); //muestra todos los datos request
        $error = false;
        $this->validate($request, Library::$rules, Library::$messages);

        $library = new Library();
        
        $library->user_id = auth()->user()->id;
        $library->name = $request->input('name');
        $library->description = $request->input('description');
        $library->image = null;

        if($library->save()){
            $notification = "Producto registrado correctamente.";
        }
        else{
            $notification = "Error al registrar el producto. Pruebe de nuevo más tarde.";
            $error = true;
        } //insert

        return back()->with(compact('notification', 'error'));
    }
}
