<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApuestaController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ApuestaController::class, 'index'])->name('apuestas.index');

Route::get('/apuestas', [ApuestaController::class, 'index'])->name('apuestas.index');
Route::get('/apuestas/mayores3Jugadores', [ApuestaController::class, 'mayores3Jugadores'])->name('apuestas.mayores3Jugadores');
Route::get('/apuestas/comparacionCartas', [ApuestaController::class, 'comparacionCartas'])->name('apuestas.comparacionCartas');
Route::get('/apuestas/buscarPorJuego/{idJuego}', [ApuestaController::class, 'buscarPorJuego'])->name('apuestas.buscarPorJuego');
Route::get('/apuestas/create', [ApuestaController::class, 'create'])->name('apuestas.create');
Route::post('/apuestas', [ApuestaController::class, 'store'])->name('apuestas.store');