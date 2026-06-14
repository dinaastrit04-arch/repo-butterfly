<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

Route::get('/', [TugasController::class, 'index']);

Route::post('/upload', [TugasController::class, 'upload']);
Route::get('/download/{id}', [TugasController::class, 'download']);
Route::delete('/hapus/{id}', [TugasController::class, 'hapus']);