<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::group(['middleware'=>['auth']] , function(){


	Route::get('/dashboard', function () {
	    return view('dashboard');
	})->name('dashboard');

	Route::get('/all-post', [PostController::class, 'index']);
	Route::get('/create-post', [PostController::class, 'create_post'])->name('create.post');
	Route::post('/store-post', [PostController::class, 'store_post'])->name('store.post');

});


require __DIR__.'/auth.php';
