<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    // echo "Hello World";
});

Route::get('/about', function (){
    return view('pages.about');
});

Route::get('/users/{id} {name}', function ($id, $name){
    return "This user is ".$name." with an id of ".$id;
});

Route::get('/index', [PagesController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);


Route::get('/usercontroller', [UserController::class, 'index']);


