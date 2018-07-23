<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Type;
use File;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('admin/types/index')->with(compact('types'));
    }
}
