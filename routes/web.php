<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tacheController;

Route::get('/', [tacheController::class, 'index'])
    ->name('tache.index');
Route::get('/create', [tacheController::class, 'create'])
    ->name('tache.create');
Route::post('/store', [tacheController::class, 'store'])
    ->name('tache.store');
Route::get('/edit/{id}', [tacheController::class, 'edit'])
    ->name('tache.edit');
Route::Put('/update/{id}', [tacheController::class, 'update'])
    ->name('tache.update');
Route::delete('/destroy/{id}', [tacheController::class, 'destroy'])
    ->name('tache.destroy');