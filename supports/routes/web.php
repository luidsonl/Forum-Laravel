<?php
//Route::get('/url', [SiteController::class, 'function']);
//A rota é definida para a URL '/url'. Quando um usuário acessa essa URL no navegador, a função 'function' do controller 'SiteController' será executada.

//O ->name() é usado para apelidar uma rota

use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Admin\ReplyController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Middleware\CheckAuth;

//Rotas protegidas
Route::middleware(CheckAuth::class)->group(function () {
    
    //Rotas post
    Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::post('/supports/reply', [ReplyController::class, 'store'])->name('reply.store');

    // Rotas get
    Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
    Route::get('/supports/my', [SupportController::class, 'my'])->name('supports.my');
    Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

    //Rotas get dinâmicas
    Route::get('/supports/{id}/edit',[SupportController::class, 'edit'])->name('supports.edit');
    Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
    Route::get('/supports/reply/{id}/edit', [ReplyController::class, 'edit'])->name('reply.edit');
    Route::get('/supports/reply/{supportId}', [ReplyController::class, 'create'])->name('reply.create');

    //Rotas patch (atualização parcial de registros)
    Route::patch('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
    Route::patch('/supports/reply/{id}', [ReplyController::class, 'update'])->name('reply.update');

    //Rotas delete
    Route::delete('supports/{id}',[SupportController::class, 'destroy'])->name('supports.destroy');
    Route::delete('supports/reply/{id}',[ReplyController::class, 'destroy'])->name('reply.destroy');
});

//Rotas não protegidas
//Post
Route::post('/auth', [UserController::class, 'auth'])->name('user.auth');
Route::post('/users', [UserController::class, 'store'])->name('user.store');



//Rotas get
Route::get('/signup', [UserController::class, 'signup'])->name('user.signup');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/', [UserController::class, 'login'])->name('user.login');


