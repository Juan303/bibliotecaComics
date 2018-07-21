<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CollectionCategory;
use App\Number;

class Collection extends Model
{
    public function collection_categories(){
        return $this->hasMany(CollectionCategory::class);
    }

    public function numbers(){
        return $this->hasMany(Number::class);
    }
}
