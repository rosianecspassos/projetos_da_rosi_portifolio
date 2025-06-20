<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\SobreController;
use Illuminate\Support\Facades\Route;






// Rotas públicas — só listagem / view de conteúdo

Route::prefix('home')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});



// Rotas para Projetos

// Rotas públicas - listagem
Route::prefix('projetos')->group(function() {
    Route::get('/', [ProjetoController::class, 'index'])->name('projetos.index');
});


// Rotas para Sobre


Route::prefix('sobre')->group(function() {
    Route::get('/', [SobreController::class, 'index'])->name('sobre.index');
});

Route::get('/force-logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});



require __DIR__.'/auth.php';

