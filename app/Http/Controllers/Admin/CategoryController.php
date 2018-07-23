<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use File;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin/categories/index')->with(compact('categories'));
    }

    public function create(){
        return view('admin/categories/create');
    }

    public function store(Request $request){
        //dd($request->all()); //muestra todos los datos request
        $error = false;
        $this->validate($request, Category::$rules, Category::$messages);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $category->image = $fileName;
        }
        if ($category->save()) {
            $notification = "La categoria ha sido registrada con exito";
        } else {
            $notification = "Error al registrar la categoria. Prueba de nuevo mas tarde";
            $error = true;
        } //insert

        //return redirect('admin/categories/images/'.$product->id)->with(compact('notification', 'error'));
        return redirect('admin/categories')->with(compact('notification', 'error'));
    }

    public function edit(Category $category){
        return view('admin.categories.edit')->with(compact('category')); //formulario de edicion de categorias
    }

    public function update(Request $request, Category $category){

        $error = false;
        $this->validate($request, Category::$rules, Category::$messages);

        $category->update($request->all());
         
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path().'/images/categories';
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move($path, $fileName);
            $category->image = $fileName;
        }

        if($category->save()){
            $notification = "Cambios guardados correctamente";
        }
        else{
            $notification = "Erro al registrar los cambios. Prueba de nuevo mas tarde";
            $error = true;
        }
       
        return back()->with(compact('notification', 'error'));
    }

    public function delete(Category $category){
        $error = false;

        if($category->delete()){
            $fullPath = public_path() . '/images/categories/' . $category->image;
            File::delete($fullPath);
            $notification = "Categoria eliminada con éxito";
        }
        else{
            $error = true;
            $notification = "Error al eliminar la categoria. Prueba de nuevo más tarde";
        }//lo borro;
        
        return back()->with(compact('notification', 'error')); // redirect a la pagina anterior
    }
}
