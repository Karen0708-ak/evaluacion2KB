<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotoController;

Route::get('/', function () {
    return view('welcome');
});

//Habilitando acceso al controlador
Route::resource('pilotos',PilotoController::class);

