<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AutismoController;




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
    return view('home');
});


Route::get('/telaoqautismo', function () {
    return view('telaoqautismo');
});

Route::get('/convivendocomtea', function () {
    return view('convivendocomtea');
});

Route::get('/forum', [ForumController::class, 'index']);
Route::post('/posts', [ForumController::class, 'store'])->name('posts.store');
Route::get('/posts', [ForumController::class, 'getPosts'])->name('posts.get');
Route::delete('/posts/{id}', [ForumController::class, 'destroy'])->name('posts.destroy');
Route::get('/clear-posts', function() {
    file_put_contents(storage_path('app/posts.json'), json_encode([]));
    return redirect('/')->with('status', 'Todas as postagens foram removidas!');
});

Route::get('/autismo', [AutismoController::class, 'index']);