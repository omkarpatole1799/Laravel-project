<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\omkarController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('register',[omkarController::class,'index']);
Route::post('register',[omkarController::class,'register_user']);
Route::get('signup',[omkarController::class,'sign_up']);
Route::get('view',[omkarController::class,'view_db']);

Route::get('/user/delete/{id}',[omkarController::class,'delete_user'])->name('user.delete');
Route::get('/user/edit/{id}',[omkarController::class,'edit_user'])->name('user.edit');

Route::post('/user/update/{id}',[omkarController::class,'update']);
Route::post('status_update/{id}',[omkarController::class,'status_update']);

Route::get('popup/{id}',[omkarController::class,'view_data']);