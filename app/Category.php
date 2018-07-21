<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CollectionCategory;

class Category extends Model
{
    public function collection_categories(){
        return $this->hasMany(CollectionCategory::class);
    }
}
