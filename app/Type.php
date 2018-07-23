<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Collection;

class Type extends Model
{
    protected $fillable = ['name', 'description'];
    
    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'name.min' => 'El campo nombre debe contener 3 caracteres como mínimo',
        'description.required' => 'El campo descripcion es obligatorio',
        'description.max' => 'El campo descripcion no puede contener mas de 200 caracteres',
        'description.min' => 'El campo descripcion no puede contener menos de 3 caracteres'
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200|min:3'
    ];
    
    public function collections(){
        return $this->hasMany(Collection::class);
    }
    
    public function getUrlImageAttribute(){
        if($this->image == NULL){
            return '/images/types/default.png';
        }
        return '/images/types/'.$this->image;
    }
}
