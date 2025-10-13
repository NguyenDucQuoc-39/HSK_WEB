<div class="p-4 bg-slate-50 rounded-lg border">
    <div class="flex justify-between items-center mb-4">
        <p class="font-bold text-slate-700">Câu {{ $question->order }}</p>
        @if($question->audio_url)
            <audio controls controlsList="nodownload noremoteplayback" src="{{ $question->audio_url }}" class="h-8"></audio>
        @endif
    </div>
    
    @if($question->image_url)
        <img src="{{ $question->image_url }}" alt="Câu hỏi {{ $question->order }}" class="mb-4 rounded-md max-h-48 mx-auto shadow-sm">
    @endif
    
    <div class="flex justify-center gap-4">
        @foreach($question->options as $option)
            <label class="flex items-center justify-center w-24 p-3 rounded-lg border-2 hover:border-indigo-400 cursor-pointer has-[:checked]:bg-indigo-100 has-[:checked]:border-indigo-500 transition">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->is_correct ? 'true' : 'false' }}" class="sr-only">
                <span class="text-2xl font-bold">{{ $option->label }}</span>
            </label>
        @endforeach
    </div>
</div>