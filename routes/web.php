<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SolicitacaoController;

Route::get('/', function () {
    return view('index');
})->name('login');

Route::post('/', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/register-users', [UserController::class, 'create'])->name('register-users');
    Route::post('/register-users', [UserController::class, 'store'])->name('register-users.store');
    
    Route::get('/solicitacao/create', [SolicitacaoController::class, 'create'])->name('solicitacao.create');
    Route::get('/solicitacao', [SolicitacaoController::class, 'index'])->name('solicitacao.index');
    Route::post('/solicitacao', [SolicitacaoController::class, 'store'])->name('solicitacao.store');

});
