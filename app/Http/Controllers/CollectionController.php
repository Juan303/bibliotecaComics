<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\Type;
use App\Category;
use App\CollectionCategory;
use App\Collection;
use App\User;

class CollectionController extends Controller
{
    public function index(Library $library){
        if(auth()->user()->id == $library->user->id){
            $collections = $library->collections;
            return view('libraries.collections.index')->with(compact('collections', 'library'));
        }
    }
    
    public function create(Library $library){
        $categories = Category::all();
        $types = Type::all();
        return view('libraries.collections.create')->with(compact('library', 'types', 'categories'));

    }
    
    public function store(Request $request, Library $library){
          
        $this->validate($request, Collection::$rules, Collection::$messages);
        
        $collection = New Collection();
        $collection->name = $request->input('name');
        $collection->description = $request->input('description');
        $collection->visibility = $request->input('visibility');
        $collection->library_id = $library->id;
        $collection->type_id = $request->type;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path().'/images/users/user_'.auth()->user()->id.'/collections';
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move($path, $fileName);
            $collection->image = $fileName;
        }
        if($collection->save()){
            foreach($request->input('categories') as $category_id){
                $collection_category = New CollectionCategory();
                $collection_category->collection_id = $collection->id;
                $collection_category->category_id = $category_id;
                $collection_category->save();
            }
        }
        return redirect('numbers/create/'.$collection->id);
    }

    public function edit(Collection $collection){
       
        $categories = Category::all();
        $types = Type::all();
        return view('libraries/collections/edit')->with(compact('collection', 'categories', 'types')); //formulario de edicion de la coleccion
    }
}
