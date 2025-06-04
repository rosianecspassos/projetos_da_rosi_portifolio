<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\SobreController;
use Illuminate\Support\Facades\Route;
// Rotas para home
Route::prefix('home')->group(function(){
  // Rota para página inicial
  Route::get('/', [HomeController::class, 'index'])->name('home.index');
  // Rota para salvar os dados
  Route::post('/', [HomeController::class, 'store'])->name('home.store'); 
  // Rota para upload da foto de perfil
  Route::post('/upload/foto-perfil', [HomeController::class, 'uploadFotoPerfil'])->name('upload.foto-perfil');
  //cadastros da home 
   // Rota para página de cadastro dos dados
   Route::get('/cadastrar', [HomeController::class, 'create'])->name('home.create');
// Rota para editar e apagar um registro
Route::get('/editar', [HomeController::class, 'editar'])-> name('home.editar');
Route::get('/{id}/edit', [HomeController::class, 'edit'])-> name('home.edit');
Route::put('/{id}', [HomeController::class, 'update'])->name('home.update'); 
Route::delete('/{id}', [HomeController::class, 'destroy'])->name('home.destroy'); 
});

    // Rotas para a seção de projetos
    Route::prefix('projetos')->group(function () {
      // Listar projetos
      Route::get('/', [ProjetoController::class, 'index'])->name('projetos.index');

      // Formulário de cadastro
      Route::get('/cadastrar', [ProjetoController::class, 'create'])->name('projetos.create');

      // Salvar novos projetos
      Route::post('/', [ProjetoController::class, 'store'])->name('projetos.store');

      // Página de edição com lista (geral)
      Route::get('/editar', [ProjetoController::class, 'editar'])->name('projetos.editar');

      // Página de edição específica (projeto único)
      Route::get('/{id}/edit', [ProjetoController::class, 'edit'])->name('projetos.edit');

      // Atualizar projeto
      Route::put('/{id}', [ProjetoController::class, 'update'])->name('projetos.update');

      // Deletar projeto
      Route::delete('/{id}', [ProjetoController::class, 'destroy'])->name('projetos.destroy');
  });


   //Rotas sobre
 
  Route::prefix('sobre')->group(function () {

    // Listar
    Route::get('/', [SobreController::class, 'index'])->name('sobre.index');

    // Formulário de cadastro
    Route::get('/cadastrar', [SobreController::class, 'create'])->name('sobre.create');

    // Salvar (POST /sobre)
    Route::post('/', [SobreController::class, 'store'])->name('sobre.store');

    // Página com todos para editar
    Route::get('/editar', [SobreController::class, 'editar'])->name('sobre.editar');

    // Página para editar um registro
    Route::get('/{id}/edit', [SobreController::class, 'edit'])->name('sobre.edit');

    // Atualizar
    Route::put('/{id}', [SobreController::class, 'update'])->name('sobre.update');

    // Deletar
    Route::delete('/{id}', [SobreController::class, 'destroy'])->name('sobre.destroy');
});

//Autentificação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
