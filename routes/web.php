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
    $sort = request('sort', 'desc');

    $posts = \App\Models\Post::published()
        ->orderBy('published_date', $sort)
        ->paginate(2);
    return view('index', compact('posts'));
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth']] , function(){

	Route::get('/', [PostController::class, 'index'])->name('dashboard');
	Route::group(['prefix'=>'posts'] , function(){
		Route::get('/{post}', [PostController::class, 'show'])->name('show.post');
		Route::get('/create', [PostController::class, 'create'])->name('create.post');
		Route::post('/store', [PostController::class, 'store'])->name('store.post');
    });
});


require __DIR__.'/auth.php';
