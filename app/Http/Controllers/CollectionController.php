<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
use App\Type;
use App\Category;
use App\CollectionCategory;
use App\Collection;

class CollectionController extends Controller
{
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
}
