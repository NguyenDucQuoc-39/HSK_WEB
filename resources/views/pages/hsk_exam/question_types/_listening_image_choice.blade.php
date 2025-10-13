<div class="p-4 bg-slate-50 rounded-lg border">
    <div class="flex justify-between items-start mb-4">
        <p class="font-bold text-slate-700">Câu {{ $question->order }}</p>
        @if($question->audio_url)
            <audio controls controlsList="nodownload noremoteplayback" src="{{ $question->audio_url }}" class="h-8"></audio>
        @endif
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        @foreach($question->options as $option)
            <label class="relative rounded-lg border-2 border-transparent hover:border-indigo-400 cursor-pointer has-[:checked]:border-indigo-500 transition overflow-hidden group">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" class="sr-only">
                <img src="{{ $option->image_url }}" class="w-full h-auto aspect-square object-cover transition duration-300 group-hover:scale-105">
                <span class="absolute top-2 left-2 bg-white/80 rounded-full h-7 w-7 flex items-center justify-center font-bold text-slate-700">{{ $option->label }}</span>
            </label>
        @endforeach
    </div>
</div>