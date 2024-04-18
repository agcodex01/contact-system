<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('login.view');

Route::get('auth/register');

Route::prefix('auth')->group(function () {
    Route::get('register', [AuthController::class, 'registerView'])->name('register.view');
    Route::post('register', [AuthController::class, 'registerAction'])->name('register.action');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});


Route::middleware('auth')->group(function () {
    Route::resource('contacts', ContactController::class)->except('show');

    Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::view('thank-you', 'thank-you')->name('thank-you');
});
