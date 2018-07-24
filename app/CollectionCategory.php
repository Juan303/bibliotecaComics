<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Collection;

class CollectionCategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    } 

    public function collection(){
        return $this->belongsTo(Collection::class);
    } 
}
