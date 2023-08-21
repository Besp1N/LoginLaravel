<?php

use App\Http\Controllers\UserController;
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
    return view('index');
});

Route::get("/register", function (){
   return view("auth.register");
})->name("auth.register");

Route::post("/register", [UserController::class, "register"])->name("auth.register.post");

Route::get("/login", function (){
    return view("auth.login");
})->name("auth.login");
