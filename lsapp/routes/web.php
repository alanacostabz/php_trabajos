<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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


Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);