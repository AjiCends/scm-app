<?php

use App\Http\Controllers\admin\MaterialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.bahan-baku.index');
// });

Route::get('/bahan-baku', [MaterialController::class,'index'])->name('bahan-baku.index');
Route::get('/bahan-baku/store/{id}', [MaterialController::class,'show'])->name('bahan-baku.show');
