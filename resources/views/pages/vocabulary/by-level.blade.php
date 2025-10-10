@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen">
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        {{-- SECTION 1: PAGE HEADER --}}
        <div class="md:flex md:items-center md:justify-between pb-6 border-b border-slate-200">
            <div class="flex-1 min-w-0">
                <a href="{{ route('on-tap') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700 mb-2">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Quay lại danh sách
                </a>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Từ Vựng HSK {{ $selectedLevel->id }}
                </h2>
                <p class="mt-1 text-base text-slate-500">
                    Danh sách gồm {{ $vocabularies->count() }} từ vựng.
                </p>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" class="w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v8.25A2.25 2.25 0 006 16.5h2.25m8.25-8.25H18a2.25 2.25 0 012.25 2.25v8.25A2.25 2.25 0 0118 20.25h-7.5A2.25 2.25 0 018.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 00-2.25 2.25v6" /></svg>
                    Ôn tập (Flashcard)
                </button>
            </div>
        </div>

        @if (session('success'))
            <div class="mt-6 bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-md" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- SECTION 2: ACTION BAR (Search) --}}
        <div class="mt-8">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                </div>
                <input type="text" id="search" class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-md bg-white placeholder-slate-500 focus:ring-1 focus:ring-indigo-500" placeholder="Tìm kiếm từ vựng...">
            </div>
        </div>

        {{-- SECTION 3: VOCABULARY LIST --}}
        <div class="mt-6 bg-white shadow-sm overflow-hidden rounded-lg">
            <ul role="list" class="divide-y divide-slate-200">
                @forelse($vocabularies as $vocab)
                    <li class="p-4 sm:p-6">
                        <div class="flex items-start justify-between">
                            {{-- Word Info --}}
                            <div class="flex-1 pr-4">
                                <div class="flex items-center">
                                    <p class="text-2xl font-bold text-slate-800">{{ $vocab->word }}</p>
                                    @if($vocab->word_type)
                                        <span class="ml-3 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">{{ $vocab->word_type }}</span>
                                    @endif
                                </div>
                                <p class="text-base text-slate-600 mt-1">{{ $vocab->pinyin }}</p>
                                <p class="text-base text-slate-500">{{ $vocab->meaning }}</p>
                            </div>

                            {{-- Actions --}}
                            <div class="ml-4 flex-shrink-0 flex items-center space-x-2">
                                {{-- NÚT PHÁT ÂM --}}
                                <button title="Phát âm" class="p-2 rounded-full text-slate-400 hover:bg-indigo-100 hover:text-indigo-600 transition">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
                                </button>
                                
                                {{-- NÚT SỬA --}}
                                <button title="Sửa từ" 
                                    class="edit-vocab-btn p-2 rounded-full text-slate-400 hover:bg-yellow-100 hover:text-yellow-600 transition"
                                    data-id="{{ $vocab->id }}"
                                    data-word="{{ $vocab->word }}"
                                    data-pinyin="{{ $vocab->pinyin }}"
                                    data-word_type="{{ $vocab->word_type }}"
                                    data-meaning="{{ $vocab->meaning }}"
                                    data-level_id="{{ $vocab->level_id }}"
                                    data-action="{{ route('vocabulary.update', $vocab->id) }}"
                                    data-example_sentence="{{ $vocab->examples->first()->sentence ?? '' }}"
                                    data-example_pinyin="{{ $vocab->examples->first()->pinyin ?? '' }}"
                                    data-example_meaning="{{ $vocab->examples->first()->meaning ?? '' }}">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.93zM16.862 4.487L19.5 7.125m-1.5-1.5l-2.086-2.086" /></svg>
                                </button>
                                
                                {{-- NÚT XÓA --}}
                                <form action="{{ route('vocabulary.destroy', $vocab->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa từ này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Xóa từ" class="p-2 rounded-full text-slate-400 hover:bg-red-100 hover:text-red-600 transition">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Hiển thị ví dụ --}}
                        @if($vocab->examples->isNotEmpty())
                        <div class="mt-4 pt-4 border-t border-slate-200/60">
                            <h4 class="text-sm font-semibold text-slate-600 mb-2">Ví dụ:</h4>
                            <div class="space-y-3">
                                @foreach($vocab->examples as $example)
                                <blockquote class="pl-4 border-l-4 border-slate-300">
                                    <p class="text-md font-medium text-slate-700">{{ $example->sentence }}</p>
                                    <p class="text-sm text-slate-500">{{ $example->pinyin }}</p>
                                    <p class="text-sm text-slate-500 italic">"{{ $example->meaning }}"</p>
                                </blockquote>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </li>
                @empty
                    <li class="text-center p-12">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" /></svg>
                        <h3 class="mt-2 text-sm font-medium text-slate-900">Không có từ vựng</h3>
                        <p class="mt-1 text-sm text-slate-500">Chưa có từ vựng nào cho cấp độ này.</p>
                        <div class="mt-6">
                           <button type="button" id="addVocabBtnEmpty" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                + Thêm từ vựng mới
                           </button>
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

{{-- MODAL CHỈNH SỬA TỪ VỰNG --}}
<div id="editVocabModal" class="hidden fixed inset-0 bg-gray-900/80 backdrop-blur-sm justify-center items-center z-50 px-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg p-6 sm:p-8 relative">
        <div class="flex justify-between items-center border-b pb-3 mb-6">
            <h3 class="text-2xl font-bold text-gray-800">✏️ Chỉnh sửa từ vựng</h3>
            <button id="closeEditModalBtn" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <form id="editVocabForm" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="edit_word" class="block text-sm font-medium text-gray-700 mb-1">Chữ Hán</label>
                    <input type="text" name="word" id="edit_word" class="w-full border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="edit_pinyin" class="block text-sm font-medium text-gray-700 mb-1">Pinyin</label>
                    <input type="text" name="pinyin" id="edit_pinyin" class="w-full border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label for="edit_word_type" class="block text-sm font-medium text-gray-700 mb-1">Loại từ</label>
                    <input type="text" name="word_type" id="edit_word_type" class="w-full border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="edit_meaning" class="block text-sm font-medium text-gray-700 mb-1">Nghĩa tiếng Việt</label>
                    <input type="text" name="meaning" id="edit_meaning" class="w-full border-gray-300 rounded-lg" required>
                </div>
            </div>
            <div>
                <label for="edit_level_id" class="block text-sm font-medium text-gray-700 mb-1">Cấp độ HSK</label>
                <select name="level_id" id="edit_level_id" class="w-full border-gray-300 rounded-lg" required>
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}">HSK {{ $level->id }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="border-t pt-5 space-y-4">
                <h4 class="text-md font-semibold text-gray-600">Ví dụ minh họa</h4>
                <div>
                    <label for="edit_example_sentence" class="block text-sm font-medium text-gray-700 mb-1">Câu ví dụ (Chữ Hán)</label>
                    <textarea name="example_sentence" id="edit_example_sentence" rows="2" class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
                </div>
                 <div>
                    <label for="edit_example_pinyin" class="block text-sm font-medium text-gray-700 mb-1">Pinyin ví dụ</label>
                    <input type="text" name="example_pinyin" id="edit_example_pinyin" class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div>
                    <label for="edit_example_meaning" class="block text-sm font-medium text-gray-700 mb-1">Nghĩa tiếng Việt của ví dụ</label>
                    <textarea name="example_meaning" id="edit_example_meaning" rows="2" class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <button type="button" id="cancelEditModalBtn" class="bg-slate-200 text-slate-800 font-semibold px-6 py-2.5 rounded-lg hover:bg-slate-300 transition">Hủy</button>
                <button type="submit" class="bg-indigo-600 text-white font-semibold px-6 py-2.5 rounded-lg hover:bg-indigo-700 transition">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const editModal = document.getElementById('editVocabModal');
    const closeEditModalBtn = document.getElementById('closeEditModalBtn');
    const cancelEditModalBtn = document.getElementById('cancelEditModalBtn');
    const editForm = document.getElementById('editVocabForm');
    const editButtons = document.querySelectorAll('.edit-vocab-btn');

    const closeEditModal = () => {
        editModal.classList.add('hidden');
        editModal.classList.remove('flex');
    };

    closeEditModalBtn.addEventListener('click', closeEditModal);
    cancelEditModalBtn.addEventListener('click', closeEditModal);

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Lấy dữ liệu từ vựng chính
            const action = button.dataset.action;
            editForm.action = action;
            editForm.querySelector('#edit_word').value = button.dataset.word;
            editForm.querySelector('#edit_pinyin').value = button.dataset.pinyin;
            editForm.querySelector('#edit_word_type').value = button.dataset.word_type;
            editForm.querySelector('#edit_meaning').value = button.dataset.meaning;
            editForm.querySelector('#edit_level_id').value = button.dataset.level_id;

            // Lấy và điền dữ liệu ví dụ
            editForm.querySelector('#edit_example_sentence').value = button.dataset.example_sentence;
            editForm.querySelector('#edit_example_pinyin').value = button.dataset.example_pinyin;
            editForm.querySelector('#edit_example_meaning').value = button.dataset.example_meaning;

            editModal.classList.remove('hidden');
            editModal.classList.add('flex');
        });
    });

    editModal.addEventListener('click', (e) => {
        if (e.target === editModal) {
            closeEditModal();
        }
    });
});
</script>
@endsection