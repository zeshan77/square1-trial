<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;

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

Route::get('/', HomeController::class);

Route::group(['prefix'=>'admin', 'middleware'=>['auth']] , function(){

    Route::view('/', 'admin.dashboard')->name('dashboard');

	Route::name('posts.')
        ->prefix('posts')
        ->group(function() {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::post('/store', [PostController::class, 'store'])->name('store');
            Route::get('/import', [PostController::class, 'import'])->name('import');
            Route::get('/{post}', [PostController::class, 'show'])->name('show');
        });

	Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

});


require __DIR__.'/auth.php';
