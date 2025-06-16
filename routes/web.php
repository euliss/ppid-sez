<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SopController;

Route::get('/', function () {
    return view('dashboard');
});
 // SOP
Route::apiResource('sops', SopController::class);
Route::get('/sops', [SopController::class, 'index']);
Route::get('/sops/create', [SopController::class, 'create'])->name('sops.create');
Route::post('/sops', [SopController::class, 'store'])->name('sops.store');
Route::get('/sops/{id}', [SopController::class, 'show'])->name('sops.show');
Route::get('sops/search', [SopController::class, 'search']);
Route::patch('sops/{id}/switch-status', [SopController::class, 'switchStatus']);

