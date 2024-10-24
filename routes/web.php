<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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
    return view('home', compact('user'));
})->middleware('auth');

Route::get('/home', function () {
    $user = Auth::user();
    return view('home', compact('user'));
})->middleware('auth') -> name('home');

Route::resource('user', UserController::class);
Route::get('/register', [UserController::Class, 'create']) ->middleware('guest')->name('register');

Route::view('/login', 'login.form') ->middleware('guest') -> name('login.form');
Route::post('/auth', [LoginController::Class, 'auth'])->name('login.auth');

//logout alterado para POST para previnir ataques de CSRF 
Route::post('/logout', [LoginController::Class, 'logout'])->name('login.logout');

