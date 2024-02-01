<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

Auth::routes();
Route::delete('/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');

Auth::routes();
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Auth::routes();
Route::put('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');