<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/thi-hsk', 'pages.hsk_exam.thi-hsk')->name('thi-hsk');
Route::view('/on-tap', 'pages.vocabulary.on-tap')->name('on-tap');
Route::view('/dich', 'pages.dich')->name('dich');
Route::view('/cong-dong', 'pages.cong-dong')->name('cong-dong');


Route::middleware('auth')->group(function () {
    // Ôn tập từ vựng
    Route::get('/on-tap', [VocabularyController::class, 'index'])->name('on-tap');
    Route::post('/on-tap', [VocabularyController::class, 'store'])->name('vocabulary.store');
    Route::put('/on-tap/{id}', [VocabularyController::class, 'update'])->name('vocabulary.update');
    Route::delete('/on-tap/{id}', [VocabularyController::class, 'destroy'])->name('vocabulary.destroy');

    // Hiển thị từ vựng theo cấp độ HSK
    Route::get('/on-tap/hsk/{id}', [VocabularyController::class, 'showByLevel'])->name('vocabulary.level');
    Route::get('/on-tap/{id}/flashcard', [VocabularyController::class, 'flashcardReview'])->name('vocabulary.flashcard');
});
require __DIR__ . '/auth.php';
