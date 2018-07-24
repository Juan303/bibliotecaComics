<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CollectionCategory;
use App\Number;

class Collection extends Model
{
    protected $fillable = ['name', 'description'];
    
    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
        'description.required' => 'El campo descripcion es obligatorio',
        'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
        'categories.required' => 'Debes seleccionar al menos una categoria'
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'categories' => 'required'
    ];
    
    public function collection_categories(){
        return $this->hasMany(CollectionCategory::class);
    }

    public function numbers(){
        return $this->hasMany(Number::class);
    }
}
