<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/mod_form', function () {
    return view('mod_form');
});
Route::get('/',[UserController::class,'index']);
Route::get('/moduser/{id}',[UserController::class,'index']);
Route::post('/moduser',[UserController::class,'mod_user'])->name('user.moduser');
Route::get('/delete/{id}',[UserController::class,'delete']);

