<?php

use App\Http\Controllers\BackEnd\AdminController;
use App\Http\Controllers\FrontEnd\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/admin/login',[AdminController::class,'login']);
Route::post("/register",[RegisterController::class,'studentRegister']);