<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutismoController;
use App\Http\Controllers\GameController;




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


Route::get('/infapoio', function () {
    return view('infapoio');
});

Route::get('/Duvidas-Frequentes', function () {
    return view('DuvidasF');
});


Route::get('/atividades', [GameController::class, 'index'])->name('atividades');
Route::get('/jogo-cores', [GameController::class, 'cores'])->name('jogo.cores');
Route::get('/jogo-memoria', [GameController::class, 'memoria'])->name('jogo.memoria');
Route::get('/jogo-objetos', [GameController::class, 'objetos'])->name('jogo.objetos');
Route::get('/jogo-quebra', [GameController::class, 'quebra'])->name('jogo.quebra');

Route::get('/sobrenos', function () {
    return view('sobrenos');
});

Route::get('/leisedireitos', [AutismoController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
