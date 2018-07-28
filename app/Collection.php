<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CollectionCategory;
use App\Number;
use App\Type;
use App\Category;
use App\Library;
use App\Editorial;

class Collection extends Model
{
    protected $fillable = ['name', 'description', 'visibility', 'library_id', 'type_id'];
    
    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
        'description.required' => 'El campo descripcion es obligatorio',
        'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
        'categories.required' => 'Debes seleccionar al menos una categoria',
        'numbers.required' => "Debes indicar la cantidad de numeros de la colección",
        'numbers.min' => "La coleccion debe contener al menos un número",
        'numbers.integer' => "La cantidad de numeros de la coleccion debe ser un número entero.",
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'categories' => 'required',
        'numbers' => 'required|min:1|integer'
    ];
    
    public function collection_categories(){
        return $this->hasMany(CollectionCategory::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function numbers(){
        return $this->hasMany(Number::class);
    }
    public function library(){
        return $this->belongsTo(Library::class);
    }
    public function editorial(){
        return $this->belongsTo(Editorial::class);
    }

    public function has_category($category_id){
        foreach($this->collection_categories as $collection_category){
            if($collection_category->category->id == $category_id){
                return true;
            }
        }
        return false; 
    }
    
    public function getUrlImageAttribute(){
        if($this->image == NULL){
            return '/images/collections/collection_default.png';
        }
        return '/images/users/user_'.auth()->user()->id.'/collections/'.$this->image;
    }
}
