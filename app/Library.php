<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Collection;
use App\User;

class Library extends Model
{

    protected $fillable = ['name', 'description'];
    
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
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function collections(){
        return $this->hasMany(Collection::class);
    }

    public function getUrlImageAttribute(){
        if($this->image == NULL){
            return '/images/libraries/library_default.png';
        }
        return '/images/users/user_'.auth()->user()->id.'/libraries/'.$this->image;
    }
}
