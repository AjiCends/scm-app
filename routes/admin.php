<?php

namespace App\Http\Middleware;

use App\Http\Controllers\admin\MaterialController;
use Illuminate\Support\Facades\Route;

Route::post('/bahan-baku/store', [MaterialController::class,'store'])->name('bahan-baku.store');