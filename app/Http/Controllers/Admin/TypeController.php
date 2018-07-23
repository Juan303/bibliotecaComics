<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Type;
use File;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('admin/types/index')->with(compact('types'));
    }

    public function create(){
        return view('admin/types/create');
    }

    public function store(Request $request){
        //dd($request->all()); //muestra todos los datos request
        $error = false;
        $this->validate($request, Type::$rules, Type::$messages);

        $type = new Type();
        $type->name = $request->input('name');
        $type->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/types';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $type->image = $fileName;
        }
        if ($type->save()) {
            $notification = "El tipo ha sido registrado con exito";
        } else {
            $notification = "Error al registrar el tipo. Prueba de nuevo mas tarde";
            $error = true;
        } //insert

        return redirect('admin/types')->with(compact('notification', 'error'));
    }

    public function edit(Type $type){
        return view('admin.types.edit')->with(compact('type')); //formulario de edicion de categorias
    }

    public function update(Request $request, Type $type){

        $error = false;
        $this->validate($request, Type::$rules, Type::$messages);

        $type->update($request->all());
         
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path().'/images/types';
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move($path, $fileName);
            $type->image = $fileName;
        }

        if($type->save()){
            $notification = "Cambios guardados correctamente";
        }
        else{
            $notification = "Error al registrar los cambios. Prueba de nuevo mas tarde";
            $error = true;
        }
       
        return back()->with(compact('notification', 'error'));
    }

    public function delete(Type $type){
        $error = false;

        if($category->delete()){
            $fullPath = public_path() . '/images/types/' . $type0->image;
            File::delete($fullPath);
            $notification = "Tipo eliminado con éxito";
        }
        else{
            $error = true;
            $notification = "Error al eliminar el tipo. Prueba de nuevo más tarde";
        }//lo borro;
        
        return back()->with(compact('notification', 'error')); // redirect a la pagina anterior
    }
}
