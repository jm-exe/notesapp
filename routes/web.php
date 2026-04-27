<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('auth.login');
})->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ---- DASHBOARD AND NOTES -----

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [NoteController::class, 'dashboard'])->name('dashboard');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

    Route::get('/notes/{note}/edit', [NoteController::class, 'edit']);
    Route::put('/notes/{note}', [NoteController::class, 'update']);
});
