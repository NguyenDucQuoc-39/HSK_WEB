@extends('layouts.app')

@section('content')
<div class="bg-slate-100 min-h-screen py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">

            {{-- HEADER KẾT QUẢ --}}
            <header class="p-6 border-b text-center bg-slate-50">
                <h1 class="text-2xl font-bold text-slate-800">Kết quả: {{ $exam->title }}</h1>
            </header>

            {{-- KHU VỰC TÓM TẮT ĐIỂM SỐ --}}
            <div class="p-8 text-center">
                @php
                $percentage = $totalQuestions > 0 ? ($score / $totalQuestions) * 100 : 0;
                @endphp
                <p class="text-lg text-slate-600">Bạn đã trả lời đúng</p>
                <p class="text-6xl font-extrabold text-indigo-600 my-2">{{ $score }} / {{ $totalQuestions }}</p>
                <p class="text-2xl font-semibold text-slate-700">Đạt {{ number_format($percentage, 0) }}%</p>

                {{-- Nhận xét tự động --}}
                <p class="mt-4 text-slate-500">
                    @if($percentage >= 80)
                    Kết quả rất tốt, bạn đã nắm vững kiến thức! 🎉
                    @elseif($percentage >= 50)
                    Khá tốt, hãy tiếp tục ôn luyện để cải thiện nhé!
                    @else
                    Cần cố gắng nhiều hơn. Đừng nản lòng, hãy xem lại các câu sai.
                    @endif
                </p>

                <div class="mt-8 flex justify-center gap-4">
                    <a href="{{ route('exam.show', $exam->id) }}" class="px-6 py-2 border border-indigo-600 text-indigo-600 font-semibold rounded-lg hover:bg-indigo-100 transition">Làm lại bài thi</a>
                    <a href="{{ route('thi-hsk') }}" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">Quay về danh sách</a>
                </div>
            </div>

            {{-- KHU VỰC XEM LẠI BÀI LÀM --}}
            <div class="border-t p-6 space-y-8">
                <h2 class="text-xl font-bold text-center text-slate-800">Xem lại bài làm</h2>
                {{-- Trong file results.blade.php --}}
                @foreach($exam->sections as $section)
                <section>
                    <h3 class="text-lg font-semibold border-b pb-2 mb-4">{{ $section->title }}</h3>
                    @foreach($section->questions as $question)
                    @php
                    $questionId = $question->id;
                    $userAnswer = $userAnswers[$questionId] ?? null;
                    $correctAnswer = $correctAnswers[$questionId] ?? null;
                    $isCorrect = ($userAnswer !== null && $userAnswer == $correctAnswer);

                    // Danh sách các loại câu hỏi có đáp án là chữ cái/văn bản
                    $directAnswerTypes = ['listening_image_match', 'reading_image_match', 'reading_match_pair', 'reading_fill_in_blank'];
                    @endphp
                    <div class="mb-6 p-4 rounded-md {{ $isCorrect ? 'bg-green-50 border-l-4 border-green-400' : 'bg-red-50 border-l-4 border-red-400' }}">

                        <p class="font-semibold mb-2">Câu {{ $question->order }}: {{ $question->content }}</p>

                        {{-- HIỂN THỊ CHI TIẾT DỰA TRÊN LOẠI CÂU HỎI --}}
                        @if (in_array($question->type, $directAnswerTypes))
                        <div class="mt-2 text-sm">
                            <p>Câu trả lời của bạn: <strong class="font-mono text-lg {{ $isCorrect ? 'text-green-700' : 'text-red-700' }}">{{ $userAnswer ?? '(chưa trả lời)' }}</strong></p>
                            <p>Đáp án đúng: <strong class="font-mono text-lg text-green-700">{{ $correctAnswer }}</strong></p>
                        </div>
                        @else
                        {{-- Giao diện cho các câu hỏi trắc nghiệm còn lại --}}
                        <div class="space-y-1 mt-4">
                            @foreach($question->options as $option)
                            <div class="flex items-center p-2 rounded 
                                @if($option->is_correct)
                                 bg-green-200
                                @elseif(isset($userAnswers[$questionId]) && $userAnswers[$questionId] == $option->id)
                                 bg-red-200 
                                @endif">

                                <span class="mr-3 w-5 font-bold text-sm">
                                    @if(isset($userAnswers[$questionId]) && $userAnswers[$questionId] == ($option->is_correct ? 'true' : 'false') || (isset($userAnswers[$questionId]) && $userAnswers[$questionId] == $option->id))
                                    {{ $isCorrect ? '✔' : '✘' }}
                                    @endif
                                </span>
                                <span>{{ $option->label }}. {{ $option->content }}</span>
                                @if($option->is_correct)
                                <span class="ml-auto text-green-700 font-semibold text-sm">(Đáp án đúng)</span>
                                @endif
                            </div>
                            @endforeach
                            @if(!isset($userAnswers[$questionId]))
                            <p class="text-red-600 text-sm mt-2">Bạn đã bỏ qua câu này.</p>
                            @endif
                        </div>
                        @endif
                    </div>
                    @endforeach
                </section>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection