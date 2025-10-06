<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})-> middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/thi-hsk', 'pages.thi-hsk')->name('thi-hsk');
Route::view('/on-tap', 'pages.on-tap')->name('on-tap');
Route::view('/dich', 'pages.dich')->name('dich');
Route::view('/cong-dong', 'pages.cong-dong')->name('cong-dong');


require __DIR__.'/auth.php';
