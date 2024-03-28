<?php

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

Route::middleware(\App\Http\Middleware\Added\Layout::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', \App\Livewire\Index::class)->name('index');
        Route::get('/logout', function () {
            auth()->logout();
            return redirect()->route('login');
        })->name('logout');
    });


    Route::get('/login', \App\Livewire\Login::class)->name('login');
    Route::get('/signup', \App\Livewire\Signup::class)->name('signup');
});


