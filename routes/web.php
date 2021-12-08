<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class, 'setUsersOfertas'])->name('home');
Route::get('/ofertas', [App\Http\Controllers\OfertaController::class, 'index'])->name('ofertas');
Route::post('/ofertas', [App\Http\Controllers\OfertaController::class, 'setCanjeado'])->name('ofertas');