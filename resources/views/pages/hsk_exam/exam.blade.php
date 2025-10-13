@extends('layouts.app')

@section('content')
<div class="bg-slate-100 min-h-screen">
    <form id="exam-form" action="{{ route('exam.submit', $exam->id) }}" method="POST">
        @csrf
        {{-- Header cố định (Sticky Header) --}}
        <header class="sticky top-0 z-20 bg-white/80 backdrop-blur-md shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">{{ $exam->title }}</h1>
                        <a href="{{ route('thi-hsk') }}" class="text-sm text-slate-500 hover:text-indigo-600">&larr; Quay lại danh sách</a>
                    </div>
                    <div class="flex items-center gap-4">
                        <div id="timer" class="text-xl font-bold text-red-600 bg-red-100 px-3 py-1 rounded-md tabular-nums" data-duration="{{ $exam->duration_minutes }}"></div>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition">
                            Nộp Bài
                        </button>
                    </div>
                </div>
            </div>
        </header>
        
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 space-y-12">
                @foreach($exam->sections as $section)
                    <section>
                        {{-- Tiêu đề của mỗi phần thi (Nghe, Đọc) --}}
                        <div class="border-b pb-4 mb-8">
                            <h2 class="text-2xl font-bold text-slate-800">{{ $section->title }}</h2>
                            @if($section->instruction)
                                <p class="text-slate-600 mt-1 italic">{{ $section->instruction }}</p>
                            @endif
                        </div>
                        
                        {{-- Vòng lặp duy nhất cho các câu hỏi, đảm bảo đúng thứ tự --}}
                        <div class="space-y-8">
                            @foreach($section->questions as $question)

                                {{-- SỬA LỖI: LOGIC MỚI ĐỂ HIỂN THỊ NGÂN HÀNG ĐÚNG CHỖ --}}
                                @if($question->order == 11 && isset($section->instruction_options['image_bank_11_15']))
                                    @include('pages.hsk_exam.question_types._banks', ['bank' => $section->instruction_options['image_bank_11_15'], 'title' => 'Ngân hàng hình ảnh cho câu 11-15:'])
                                @endif

                                @if($question->order == 26 && isset($section->instruction_options['image_bank_26_30']))
                                     @include('pages.hsk_exam.question_types._banks', ['bank' => $section->instruction_options['image_bank_26_30'], 'title' => 'Ngân hàng hình ảnh cho câu 26-30:'])
                                @endif

                                @if($question->order == 31 && isset($section->instruction_options['text_bank_31_35']))
                                    @include('pages.hsk_exam.question_types._banks', ['bank' => $section->instruction_options['text_bank_31_35'], 'title' => 'Ngân hàng lựa chọn cho câu 31-35:'])
                                @endif
                                
                                @if($question->order == 36 && isset($section->instruction_options['text_bank_36_40']))
                                    @include('pages.hsk_exam.question_types._banks', ['bank' => $section->instruction_options['text_bank_36_40'], 'title' => 'Ngân hàng từ cho câu 36-40:'])
                                @endif

                                @php
                                    // Truyền ngân hàng đáp án tương ứng vào component con (nếu cần)
                                    $optionsBank = [];
                                    if($question->type === 'listening_image_match') $optionsBank = $section->instruction_options['image_bank_11_15'] ?? [];
                                    if($question->type === 'reading_image_match') $optionsBank = $section->instruction_options['image_bank_26_30'] ?? [];
                                    if($question->type === 'reading_match_pair') $optionsBank = $section->instruction_options['text_bank_31_35'] ?? [];
                                    if($question->type === 'reading_fill_in_blank') $optionsBank = $section->instruction_options['text_bank_36_40'] ?? [];
                                @endphp

                                {{-- Hiển thị component của câu hỏi hiện tại --}}
                                @includeFirst([
                                    'pages.hsk_exam.question_types._' . $question->type,
                                    'pages.hsk_exam.question_types._default'
                                ], ['question' => $question, 'optionsBank' => $optionsBank])
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        </main>
    </form>
</div>

{{-- Script cho đồng hồ đếm ngược --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const timerDisplay = document.getElementById('timer');
    let duration = parseInt(timerDisplay.dataset.duration) * 60;

    const timer = setInterval(function() {
        if (!timerDisplay) return;
        let minutes = Math.floor(duration / 60);
        let seconds = duration % 60;
        
        timerDisplay.textContent = 
            `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        if (--duration < 0) {
            clearInterval(timer);
            alert("Đã hết thời gian làm bài!");
            document.getElementById('exam-form').submit();
        }
    }, 1000);
});
</script>
@endsection