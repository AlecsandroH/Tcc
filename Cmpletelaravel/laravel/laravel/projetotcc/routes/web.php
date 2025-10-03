<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutismoController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Auth\ForumAuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AdminForumController;
use App\Http\Controllers\ForumProfileController;
use App\Http\Controllers\ForumPasswordController;

// Rotas principais do site
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

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/leisedireitos', [AutismoController::class, 'index']);

// ========== ROTAS DO FÓRUM ==========

// Rota PÚBLICA para a página inicial do fórum
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

// Rotas PÚBLICAS de autenticação (login/registro)
Route::get('/forum/login', [ForumAuthController::class, 'showLoginForm'])->name('forum.login');
Route::post('/forum/login', [ForumAuthController::class, 'login'])->name('forum.login.submit');

Route::get('/forum/register', [ForumAuthController::class, 'showRegisterForm'])->name('forum.register');
Route::post('/forum/register', [ForumAuthController::class, 'register'])->name('forum.register.submit');

// Rotas PROTEGIDAS (requerem login)
Route::middleware(['auth:forum'])->group(function () {
    // Rota de logout
    Route::post('/forum/logout', [ForumAuthController::class, 'logout'])->name('forum.logout');
    
    // Ações do fórum (apenas logados podem postar)
    Route::post('/forum/posts', [ForumController::class, 'storePost'])->name('forum.post.store');
    Route::post('/forum/posts/{post}/comentarios', [ForumController::class, 'storeComentario'])->name('forum.comentario.store');
    Route::delete('/forum/posts/{post}', [ForumController::class, 'destroyPost'])->name('forum.post.destroy');
    Route::delete('/forum/comentarios/{comentario}', [ForumController::class, 'destroyComentario'])->name('forum.comentario.destroy');
    
    // Dashboard admin (acesso restrito)
    Route::get('/forum/admin/dashboard', [AdminForumController::class, 'dashboard'])
         ->name('forum.admin.dashboard')
         ->middleware('forum.admin');

  // Rotas de perfil
  Route::get('/forum/meu-perfil', [ForumProfileController::class, 'show'])->name('forum.profile');
  Route::put('/forum/meu-perfil', [ForumProfileController::class, 'updateProfile'])->name('forum.profile.update');
  Route::put('/forum/meu-perfil/senha', [ForumProfileController::class, 'updatePassword'])->name('forum.profile.password.update');
  Route::delete('/forum/meu-perfil/avatar', [ForumProfileController::class, 'deleteAvatar'])->name('forum.profile.avatar.delete');

});

Route::get('/forum/redefinir-senha', [ForumPasswordController::class, 'showResetForm'])
     ->name('forum.password.request');

Route::post('/forum/redefinir-senha', [ForumPasswordController::class, 'resetPassword'])
     ->name('forum.password.update');
