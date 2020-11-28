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

// Route::get('/hello', function () {
//     //return view('welcome');
//     return 'hello';
// });

// Route::get('/users/{id}/{name}', function ($id, $name) {
//     return 'This is user ' . $name . 'with an id of ' . $id;
// });

// Route::get('/about', function () {
//     return view('/pages.about');
// });

use App\Http\Controllers\PagesController;

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('categorias', 'CategoriasController');
Route::resource('marcas', 'MarcasController');
Route::resource('productos', 'ProductosController');
