<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collection;

class Editorial extends Model
{
    public function Collections(){
        return $this->hasMany(Collection::class);
    }
}
