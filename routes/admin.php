<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

use Illuminate\Support\Facades\Route;

// Rotas protegidas (admin) — CRUD completo (middleware auth)


Route::middleware('auth')->prefix('home')->group(function() {
    Route::post('/', [HomeController::class, 'store'])->name('home.store');
    Route::post('/upload/foto-perfil', [HomeController::class, 'uploadFotoPerfil'])->name('upload.foto-perfil');
    Route::get('/cadastrar', [HomeController::class, 'create'])->name('home.create');
    Route::get('/editar', [HomeController::class, 'editar'])->name('home.editar');
    Route::get('/{id}/edit', [HomeController::class, 'edit'])->name('home.edit');
    Route::put('/{id}', [HomeController::class, 'update'])->name('home.update');
    Route::delete('/{id}', [HomeController::class, 'destroy'])->name('home.destroy');
});

// Projetos admin
Route::middleware('auth')->prefix('projetos')->group(function() {
    Route::get('/cadastrar', [ProjetoController::class, 'create'])->name('projetos.create');
    Route::post('/', [ProjetoController::class, 'store'])->name('projetos.store');
    Route::get('/editar', [ProjetoController::class, 'editar'])->name('projetos.editar');
    Route::get('/{id}/edit', [ProjetoController::class, 'edit'])->name('projetos.edit');
    Route::put('/{id}', [ProjetoController::class, 'update'])->name('projetos.update');
    Route::delete('/{id}', [ProjetoController::class, 'destroy'])->name('projetos.destroy');
});

// Sobre admin
Route::middleware('auth')->prefix('sobre')->group(function() {
    Route::get('/cadastrar', [SobreController::class, 'create'])->name('sobre.create');
    Route::post('/', [SobreController::class, 'store'])->name('sobre.store');
    Route::get('/editar', [SobreController::class, 'editar'])->name('sobre.editar');
    Route::get('/{id}/edit', [SobreController::class, 'edit'])->name('sobre.edit');
    Route::put('/{id}', [SobreController::class, 'update'])->name('sobre.update');
    Route::delete('/{id}', [SobreController::class, 'destroy'])->name('sobre.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
