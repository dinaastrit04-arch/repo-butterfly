<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

Route::get('/', [TugasController::class, 'index']);

Route::post('/upload', [TugasController::class, 'upload']);