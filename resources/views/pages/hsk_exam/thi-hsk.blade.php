@extends('layouts.app')

@section('content')
<div class="bg-slate-100 min-h-screen">
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <header class="text-center mb-16">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-800 tracking-tight">Luyện Thi HSK</h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-slate-600">Chọn cấp độ và đề thi bạn muốn thử sức.</p>
        </header>

        <div class="space-y-12">
            @forelse($levels as $level)
                @if($level->exams->isNotEmpty())
                    <div>
                        <h2 class="text-2xl font-bold text-slate-700 border-b pb-2 mb-6">HSK Cấp Độ {{ $level->id }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($level->exams as $exam)
                                <a href="{{ route('exam.show', $exam->id) }}" class="group block bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                    <h3 class="text-xl font-semibold text-indigo-600 group-hover:text-indigo-700">{{ $exam->title }}</h3>
                                    <p class="text-slate-500 mt-2">Thời gian: {{ $exam->duration_minutes }} phút</p>
                                    <p class="text-slate-500">Số câu: 40 câu</p>
                                    <div class="mt-4 text-right">
                                        <span class="font-semibold text-indigo-500 group-hover:text-indigo-600 transition-colors">
                                            Bắt đầu làm bài &rarr;
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-center text-slate-500 col-span-full">Chưa có dữ liệu cấp độ HSK. Vui lòng chạy seeder.</p>
            @endforelse
        </div>
    </main>
</div>
@endsection