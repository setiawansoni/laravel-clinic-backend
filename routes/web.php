<?php

use App\Http\Controllers\DoctorController;
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
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');

    //User
    Route::resource('users', UserController::class);

    //Doctor
    Route::resource('doctors', DoctorController::class);
});