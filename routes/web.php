<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MaterialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Middleware\RegisteredAuth;
use Illuminate\Support\Facades\Auth;
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


Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(RegisteredAuth::class)->group( function () {
    Route::get('/bahan-baku', [MaterialController::class,'index'])->name('bahan-baku.index');    
    Route::get('/bahan-baku/store/{id}', [MaterialController::class,'show'])->name('bahan-baku.show');
    Route::get('/pengguna', [UserController::class,'index'])->name('pengguna.index');
    Route::get('/pengguna/store/{id}', [UserController::class,'show'])->name('pengguna.show');
    Route::post('/jadwal/create/{id}',[ScheduleController::class,'store'])->name('jadwal.create');    
});
