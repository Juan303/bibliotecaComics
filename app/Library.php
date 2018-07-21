<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Collection;

class Library extends Model
{
    public function collections(){
        return $this->hasMany(Collection::class);
    }
}
