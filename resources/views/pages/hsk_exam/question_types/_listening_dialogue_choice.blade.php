<div class="p-4 bg-slate-50 rounded-lg border">
    <div class="flex justify-between items-start mb-4">
        <p class="font-bold text-slate-700">Câu {{ $question->order }}</p>
        @if($question->audio_url)
            <audio controls controlsList="nodownload noremoteplayback" src="{{ $question->audio_url }}" class="h-8"></audio>
        @endif
    </div>
    <div class="space-y-2">
        @foreach($question->options as $option)
            <label class="flex items-center p-3 rounded-lg border border-slate-200 bg-white hover:bg-indigo-100 cursor-pointer has-[:checked]:bg-indigo-100 has-[:checked]:border-indigo-500 transition">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                <span class="ml-3 text-slate-700"><strong>{{ $option->label }}.</strong> {{ $option->content }}</span>
            </label>
        @endforeach
    </div>
</div>