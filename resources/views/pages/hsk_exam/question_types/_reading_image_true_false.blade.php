<div class="p-4 bg-slate-50 rounded-lg border">
    <p class="font-bold text-slate-700 mb-4">Câu {{ $question->order }}</p>
    <div class="flex flex-col md:flex-row items-center justify-center gap-8">
        <p class="text-2xl font-semibold">{{ $question->content }}</p>
        @if($question->image_url)
            <img src="{{ $question->image_url }}" alt="Câu hỏi {{ $question->order }}" class="rounded-md max-h-40 shadow-sm">
        @endif
    </div>
    <div class="flex justify-center gap-4 mt-6">
        @foreach($question->options as $option)
            <label class="flex items-center justify-center w-24 p-3 rounded-lg border-2 hover:border-indigo-400 cursor-pointer has-[:checked]:bg-indigo-100 has-[:checked]:border-indigo-500 transition">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->is_correct ? 'true' : 'false' }}" class="sr-only">
                <span class="text-2xl font-bold">{{ $option->label }}</span>
            </label>
        @endforeach
    </div>
</div>