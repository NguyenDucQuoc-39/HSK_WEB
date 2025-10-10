@extends('layouts.app')

@section('content')
{{-- NỀN CHUNG CỦA TRANG --}}
<div class="bg-slate-100 min-h-screen">

    {{-- ACTION HUB Ở GÓC PHẢI TRÊN --}}
    <div class="fixed top-4 right-4 z-50">
        <div class="bg-white/70 backdrop-blur-xl p-2 rounded-full shadow-lg border border-slate-200/70">
            <button id="addVocabBtn"
                title="Thêm từ vựng mới"
                class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-full shadow-md transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-white/80">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span class="hidden sm:inline">Thêm Từ Mới</span>
            </button>
        </div>
    </div>

    {{-- NỘI DUNG CHÍNH --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">

        {{-- Header --}}
        <header class="text-center mb-16">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-800 tracking-tight">
                Hành Trình Chinh Phục HSK
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-slate-600">
                Chọn cấp độ bạn muốn ôn tập và bắt đầu ngay hôm nay.
            </p>
        </header>

        {{-- Thông báo thành công --}}
        @if (session('success'))
            <div class="max-w-3xl mx-auto mb-12 bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-sm" role="alert">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <p class="font-bold">Thành công!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Lưới các cấp độ HSK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $levelStyles = [
                1 => ['accent' => 'green-500'], 2 => ['accent' => 'sky-500'],
                3 => ['accent' => 'yellow-500'], 4 => ['accent' => 'orange-500'],
                5 => ['accent' => 'red-500'], 6 => ['accent' => 'purple-500'],
            ];
            @endphp

            @forelse($levels as $level)
                @php
                    $style = $levelStyles[$level->id] ?? ['accent' => 'gray-500'];
                @endphp
                <a href="{{ route('vocabulary.level', $level->id) }}"
                   class="group block bg-white rounded-xl border-t-4 border-{{ $style['accent'] }} p-6 shadow-md hover:shadow-2xl hover:-translate-y-2 hover:ring-2 hover:ring-offset-2 hover:ring-{{ $style['accent'] }} transition-all duration-300 flex flex-col">
                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-3xl font-extrabold text-slate-800">HSK {{ $level->id }}</h3>
                            <span class="text-4xl font-bold opacity-20 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 text-{{ $style['accent'] }}">
                                {{ $level->id }}
                            </span>
                        </div>
                        <p class="text-slate-500">
                            Cấp độ {{ $level->name ?? 'cơ bản' }}
                        </p>
                        
                        <div class="mt-4 pt-4 border-t border-slate-100 space-y-2 text-sm text-slate-600">
                            <p class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                                <strong>{{ $level->vocabularies_count }}</strong>&nbsp;từ vựng
                            </p>
                            <p class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                                <strong>{{ $level->examples_count }}</strong>&nbsp;ví dụ
                            </p>
                        </div>
                    </div>

                    <div class="text-right mt-6">
                        <span class="font-semibold text-slate-500 group-hover:text-{{ $style['accent'] }} transition-colors">
                            Bắt đầu ôn tập &rarr;
                        </span>
                    </div>
                </a>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center bg-white p-12 rounded-lg shadow-md">
                    <h3 class="mt-2 text-sm font-medium text-slate-900">Không tìm thấy dữ liệu</h3>
                    <p class="mt-1 text-sm text-slate-500">Chưa có cấp độ HSK nào trong cơ sở dữ liệu. Vui lòng chạy seeder.</p>
                </div>
            @endforelse
        </div>
    </main>
</div>

{{-- Modal Thêm Từ Vựng --}}
<div id="addVocabModal" class="hidden fixed inset-0 bg-gray-900/80 backdrop-blur-sm justify-center items-center z-[100] transition-opacity duration-300 px-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg p-6 sm:p-8 relative animate-fadeIn">
        <div class="flex justify-between items-center border-b pb-3 mb-6">
            <h3 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                <svg class="w-7 h-7 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>Thêm từ vựng mới</span>
            </h3>
            <button id="closeModalIcon" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form action="{{ route('vocabulary.store') }}" method="POST" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="word" class="block text-sm font-medium text-gray-700 mb-1">Chữ Hán <span class="text-red-500">*</span></label>
                    <input type="text" name="word" id="word" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label for="pinyin" class="block text-sm font-medium text-gray-700 mb-1">Pinyin <span class="text-red-500">*</span></label>
                    <input type="text" name="pinyin" id="pinyin" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label for="word_type" class="block text-sm font-medium text-gray-700 mb-1">Loại từ</label>
                    <input type="text" name="word_type" id="word_type" class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div>
                    <label for="meaning" class="block text-sm font-medium text-gray-700 mb-1">Nghĩa tiếng Việt <span class="text-red-500">*</span></label>
                    <input type="text" name="meaning" id="meaning" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>
            </div>
            <div>
                <label for="level_id" class="block text-sm font-medium text-gray-700 mb-1">Cấp độ HSK <span class="text-red-500">*</span></label>
                <select name="level_id" id="level_id" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                    <option value="" disabled selected>-- Chọn cấp độ --</option>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">HSK {{ $level->id }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="border-t pt-5 space-y-4">
                <h4 class="text-md font-semibold text-gray-600">Ví dụ minh họa (Tùy chọn)</h4>
                <div>
                    <label for="example_sentence" class="block text-sm font-medium text-gray-700 mb-1">Câu ví dụ (Chữ Hán)</label>
                    <textarea name="example_sentence" id="example_sentence" rows="2" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Ví dụ: 我爱学习汉语。"></textarea>
                </div>
                 <div>
                    <label for="example_pinyin" class="block text-sm font-medium text-gray-700 mb-1">Pinyin ví dụ</label>
                    <input type="text" name="example_pinyin" id="example_pinyin" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Ví dụ: Wǒ ài xuéxí Hànyǔ.">
                </div>
                <div>
                    <label for="example_meaning" class="block text-sm font-medium text-gray-700 mb-1">Nghĩa tiếng Việt của ví dụ</label>
                    <textarea name="example_meaning" id="example_meaning" rows="2" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Ví dụ: Tôi yêu học tiếng Hán."></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <button type="button" id="closeModal" class="bg-slate-200 text-slate-800 font-semibold px-6 py-2.5 rounded-lg hover:bg-slate-300 transition">Hủy</button>
                <button type="submit" class="bg-indigo-600 text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-indigo-700 transition shadow-sm hover:shadow-md">Lưu Từ</button>
            </div>
        </form>
    </div>
</div>

<script>
    // JavaScript không thay đổi, vẫn hoạt động hoàn hảo
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('addVocabModal');
        const addBtn = document.getElementById('addVocabBtn');
        const closeBtn = document.getElementById('closeModal');
        const closeIcon = document.getElementById('closeModalIcon');

        const closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        addBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        });

        closeBtn.addEventListener('click', closeModal);
        closeIcon.addEventListener('click', closeModal);

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

{{-- Tích hợp CSS Animation trực tiếp vào đây --}}
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out forwards;
    }
</style>

@endsection