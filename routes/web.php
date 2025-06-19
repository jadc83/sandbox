<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/noticias/{comentable}/comentar', [ComentarioController::class, 'comentar'])->name('comentarios.comentar');
Route::post('/noticias/{noticia}/menear', [NoticiaController::Class, 'menear'])->name('noticias.menear');
Route::resource('noticias', NoticiaController::class);
Route::resource('comentarios', ComentarioController::class);
Route::resource('pilotos', PilotoController::class)->parameters(['pilotos' => 'piloto']);
Route::post('/pilotos/{piloto}/cambiar', [PilotoController::class, 'cambiar'])->name('pilotos.cambiar');

require __DIR__.'/auth.php';
