<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShortnerUrlController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.registration');
});
// Auth section
Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('registration', [RegistrationController::class, 'create']);
Route::post('registration', [RegistrationController::class, 'store'])->name('register-submit');

//Admin section
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, "dashboard"])->name('dashboard');
    
    Route::get('all/shortner', [ShortnerUrlController::class, "index"])->name('shortner.index');
    Route::get('shortner', [ShortnerUrlController::class, "create"])->name('shortner.create');
    Route::post('shortner', [ShortnerUrlController::class, "store"])->name('shortner.store');
    Route::get('/short/{shortUrl}', [ShortnerUrlController::class, 'show'])->name('shortner.show');

});
