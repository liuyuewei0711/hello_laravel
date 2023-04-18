<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user', [UserController::class, 'test']);

Route::get('/user/{name}/{id}', function(Request $request, $name = null, $id = null){
    return 'User '.$name;
});

Route::get('/password/{id}', function($id){
    return $id;
});

Route::get('/search/{search}', function($search){
    // return urlencode('/');
    return $search;
})->where('search', '.*')->name('my');

Route::redirect('/myuser', '/user');

Route::view('/myview', 'myview', ['name'=>'Taylor']);

Route::get('/test', function(){
    return route('my', ['id'=>123, 'search'=>'abb']);
    // return redirect()->route('my', ['id'=>123, 'search'=>'abb']);
});