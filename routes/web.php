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
})->name("home.index");

Route::get("/register", function (){
   return view("auth.register");
})->name("auth.register");

Route::post("/register", [UserController::class, "register"])->name("auth.register.post");

Route::get("/login", function (){
    return view("auth.login");
})->name("auth.login");

Route::post("/login", [UserController::class, "login"])->name("auth.login.post");

Route::post("/logout", [UserController::class, "logout"])->name("auth.logout");


//Route::get('/dashboard', function () {
//    return view('dashboard.index');
//})->name("dashboard.index");

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard.index');

