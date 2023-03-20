<?php

use App\Http\Controllers\AuthenticationController;
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

Route::controller(AuthenticationController::class)->group(function () {
    Route::middleware(['guest:officer,community'])->group(function () {
        Route::get('/', 'landing')->name('landing-page');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::get('/register', 'registerPage')->name('register-page');
        Route::post('/register', 'register')->name('register');
    });
    Route::middleware(['auth:officer,community'])->group(function () {
        Route::get('/home', 'home')->name('home');
        Route::post('/logout', 'logout')->name('logout');
    });
});

// Only Community can access this route
Route::middleware(['auth:community,officer', 'checkGuard:community'])->group(function () {

});
