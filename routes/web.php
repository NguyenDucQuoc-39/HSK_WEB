<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\HSKExamController;
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
    // Hiển thị trang ôn tập từ vựng (GET)
    Route::get('/on-tap', [VocabularyController::class, 'index'])->name('on-tap');
    // Xử lý thêm từ vựng mới (POST)
    Route::post('/on-tap', [VocabularyController::class, 'store'])->name('vocabulary.store');
    // Cập nhật từ vựng theo id (PUT)
    Route::put('/on-tap/{id}', [VocabularyController::class, 'update'])->name('vocabulary.update');
    // Xóa từ vựng theo id (DELETE)
    Route::delete('/on-tap/{id}', [VocabularyController::class, 'destroy'])->name('vocabulary.destroy');

    // Hiển thị từ vựng theo cấp độ HSK
    // Lấy danh sách từ vựng theo cấp độ HSK (GET)
    Route::get('/on-tap/hsk/{id}', [VocabularyController::class, 'showByLevel'])->name('vocabulary.level');
    // Hiển thị chế độ ôn tập flashcard cho từ vựng (GET)
    Route::get('/on-tap/{id}/flashcard', [VocabularyController::class, 'flashcardReview'])->name('vocabulary.flashcard');

    // Trang chính, hiển thị danh sách các bài thi
    // Hiển thị danh sách các bài thi HSK (GET)
    Route::get('/thi-hsk', [HskExamController::class, 'index'])->name('thi-hsk');
    // Trang bắt đầu làm bài thi HSK (GET)
    Route::get('/thi-hsk/lam-bai/{exam}', [HskExamController::class, 'show'])->name('exam.show');
    // Xử lý nộp bài thi HSK (POST)
    Route::post('/thi-hsk/nop-bai/{exam}', [HskExamController::class, 'submit'])->name('exam.submit');
});
require __DIR__ . '/auth.php';
