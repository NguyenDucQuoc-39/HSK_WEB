@extends('layouts.app')

@section('content')
{{-- BƯỚC 1: Thêm một thẻ div bao bọc và đặt dữ liệu vào data-words --}}
<div id="flashcard-app" 
     data-vocabularies="{{ json_encode($vocabularies) }}" 
     class="bg-slate-900 min-h-screen flex flex-col items-center justify-center p-4 text-white">
    
    {{-- Header của trang Flashcard --}}
    <div class="w-full max-w-2xl mb-6">
        <a href="{{ route('vocabulary.level', $selectedLevel->id) }}" class="inline-flex items-center text-sm font-medium text-slate-400 hover:text-white mb-2 transition">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Quay lại danh sách
        </a>
        <h1 class="text-3xl font-bold">Ôn tập HSK {{ $selectedLevel->id }}</h1>
        <p id="progress-indicator" class="text-slate-400 mt-1"></p>
    </div>

    {{-- Khối Flashcard --}}
    <div id="flashcard-container" class="w-full max-w-2xl h-80 perspective-1000">
        <div id="flashcard" class="relative w-full h-full transform-style-3d transition-transform duration-700 cursor-pointer">
            {{-- Mặt trước của thẻ --}}
            <div id="flashcard-front" class="absolute w-full h-full backface-hidden rounded-2xl bg-white text-slate-900 flex items-center justify-center p-6 shadow-2xl">
                <p class="text-6xl font-bold"></p>
            </div>
            {{-- Mặt sau của thẻ --}}
            <div id="flashcard-back" class="absolute w-full h-full backface-hidden rounded-2xl bg-indigo-600 flex flex-col items-center justify-center p-6 shadow-2xl transform-rotate-y-180">
                <p class="text-4xl font-semibold"></p>
                <p class="text-2xl mt-2 text-indigo-200"></p>
            </div>
        </div>
    </div>

    {{-- Các nút điều khiển --}}
    <div class="w-full max-w-2xl flex justify-between items-center mt-8">
        <button id="prev-btn" class="p-4 bg-slate-700 rounded-full hover:bg-slate-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </button>
        <div class="text-center text-slate-400 text-sm">
            Nhấp vào thẻ để lật
        </div>
        <button id="next-btn" class="p-4 bg-slate-700 rounded-full hover:bg-slate-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </button>
    </div>

</div>

{{-- CSS cho hiệu ứng lật thẻ --}}
<style>
    .perspective-1000 { perspective: 1000px; }
    .transform-style-3d { transform-style: preserve-3d; }
    .backface-hidden { backface-visibility: hidden; }
    .transform-rotate-y-180 { transform: rotateY(180deg); }
    #flashcard.is-flipped { transform: rotateY(180deg); }
</style>

{{-- JavaScript điều khiển Flashcard --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
    // BƯỚC 2: Lấy dữ liệu từ thuộc tính data-vocabularies
    const flashcardApp = document.getElementById('flashcard-app');
    const words = JSON.parse(flashcardApp.dataset.vocabularies);
    
    let currentIndex = 0;
    
    // ... (Phần còn lại của script không thay đổi) ...
    const flashcard = document.getElementById('flashcard');
    const frontWord = document.querySelector('#flashcard-front p');
    const backPinyin = document.querySelector('#flashcard-back p:nth-child(1)');
    const backMeaning = document.querySelector('#flashcard-back p:nth-child(2)');
    const progressIndicator = document.getElementById('progress-indicator');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    function showWord(index) {
        flashcard.classList.remove('is-flipped');
        const word = words[index];
        frontWord.textContent = word.word;
        backPinyin.textContent = word.pinyin;
        backMeaning.textContent = word.meaning;
        progressIndicator.textContent = `Từ ${index + 1} / ${words.length}`;
    }

    flashcard.addEventListener('click', () => {
        flashcard.classList.toggle('is-flipped');
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % words.length;
        showWord(currentIndex);
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + words.length) % words.length;
        showWord(currentIndex);
    });

    showWord(currentIndex);
});
</script>
@endsection