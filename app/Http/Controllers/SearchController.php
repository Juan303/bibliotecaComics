<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class SearchController extends Controller
{
    public function data(){
        $collections = Collection::pluck('name');
        return $collections;
    }
}
