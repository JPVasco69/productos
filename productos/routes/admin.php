<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('productos', ProductoController::class)->except('show')->names('admin.productos');

