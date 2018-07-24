<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{

    public function create(){
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/users/user_'.auth()->user()->id.'/libraries';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $library->image = $fileName;
        }
        if($library->save()){
            $notification = "Producto registrado correctamente.";
        }
        else{
            $notification = "Error al registrar el producto. Pruebe de nuevo más tarde.";
            $error = true;
        } //insert

        return redirect('register_collection/'.$library->id);
    }

    public function edit(Library $library){
        return view('/libraries/edit')->with(compact('library')); //formulario de edicion de libreria
    }


    public function update(Request $request, Library $library){

        //dd($request->all()); //muestra todos los datos request
        $error = false;
        $this->validate($request, Library::$rules, Library::$messages);

        $library->update($request->all());
        
       if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $category->image = $fileName;
        }

        if($library->save()){
            $notification = "Cambios guardados correctamente.";
        }
        else{
            $notification = "Error al guardar los cambios. Pruebe de nuevo más tarde.";
            $error = true;
        } //insert

        return back()->with(compact('notification', 'error'));
    }

     public function delete(Library $library){
        $error = false;

        if($library->delete()){
            //$fullPath = public_path() . '/images/categories/' . $category->image;
            //File::delete($fullPath);
            $notification = "Biblioteca eliminada con éxito";
        }
        else{
            $error = true;
            $notification = "Error al eliminar la biblioteca. Prueba de nuevo más tarde";
        }//lo borro;
        
        return back()->with(compact('notification', 'error')); // redirect a la pagina anterior
    }
}
