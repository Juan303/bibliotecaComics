<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class CollectionController extends Controller
{
    public function create(Library $library){
     
        return view('libraries.collections.create')->with(compact('library'));

    }
}
