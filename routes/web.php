<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('Auth')->group(function(){
    Route::post('/login', 'LoginController@login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/register_library', 'LibraryController@index'); //formulario de registro
    Route::post('/register_library', 'LibraryController@store'); //Registro la nueva biblioteca
});

//=====================================CRUD's

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
    
    //categories
    //CR (Create & Read)
    Route::get('/categories', 'CategoryController@index'); //listar categorias
    Route::get('/categories/create', 'CategoryController@create'); //formulario de registro de categoria
    Route::post('/categories', 'CategoryController@store'); //almacenar categoria

    //UD (Update & Delete)

    Route::get('/categories/edit/{category}', 'CategoryController@edit'); //editar producto
    Route::post('/categories/update/{category}', 'CategoryController@update'); //guardar cambios producto

    Route::delete('/categories/{category}', 'CategoryController@delete'); //eliminar producto

    //types
    //CR (Create & Read)
    Route::get('/types', 'TypeController@index'); //listar categorias
    Route::get('/types/create', 'TypeController@create'); //formulario de registro de categoria
    Route::post('/types', 'TypeController@store'); //almacenar categoria

    //UD (Update & Delete)

    Route::get('/types/edit/{category}', 'TypeController@edit'); //editar producto
    Route::post('/types/update/{category}', 'TypeController@update'); //guardar cambios producto

    Route::delete('/types/{category}', 'TypeController@delete'); //eliminar producto


});

Route::get('/home', 'HomeController@index')->name('home');
