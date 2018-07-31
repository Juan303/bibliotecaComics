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

    //Buscador (json para autocompletar con typeahead)
    Route::get('/search/json', 'SearchController@data');
    
    //Bibliotecas
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/libraries/create', 'LibraryController@create'); //formulario de registro nueva biblioteca
    Route::post('/libraries', 'LibraryController@store'); //Registro la nueva biblioteca
    Route::get('/libraries/edit/{library}', 'LibraryController@edit'); //formulario de edicion de biblioteca
    Route::post('/libraries/update/{library}', 'LibraryController@update'); //guardar cambios de una edicion
    Route::delete('/libraries/{library}', 'LibraryController@delete'); //eliminar producto

    //Colecciones 
    Route::get('/collections/{library}', 'CollectionController@index'); //listar colecciones de una biblioteca
    Route::get('/collections/create/{library}', 'CollectionController@create'); //formulario de registro nueva coleccion
    Route::post('/collections/{library}', 'CollectionController@store'); //Registro la nueva biblioteca
    Route::get('/collections/edit/{collection}', 'CollectionController@edit'); //formulario de edicion de biblioteca
    Route::post('/collections/update/{collection}', 'CollectionController@update'); //guardar cambios de una edicion

   
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

    Route::get('/types/edit/{type}', 'TypeController@edit'); //editar producto
    Route::post('/types/update/{type}', 'TypeController@update'); //guardar cambios producto

    Route::delete('/types/{type}', 'TypeController@delete'); //eliminar producto

    //editorials
    //CR (Create & Read)
    Route::get('/editorials', 'EditorialController@index'); //listar editoriales
    Route::get('/editorials/create', 'EditorialController@create'); //formulario de registro de editorial
    Route::post('/editorials', 'EditorialController@store'); //almacenar editorial

    //UD (Update & Delete)

    Route::get('/editorials/edit/{type}', 'EditorialController@edit'); //editar editorial
    Route::post('/editorials/update/{type}', 'EditorialController@update'); //guardar cambios en editorial

    Route::delete('/editorials/{type}', 'EditorialController@delete'); //eliminar editorial



});


