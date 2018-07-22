<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Collection;

class Library extends Model
{
    
    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
        'description.required' => 'El campo descripcion es obligatorio',
        'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
    ];
    
    public function collections(){
        return $this->hasMany(Collection::class);
    }
}
