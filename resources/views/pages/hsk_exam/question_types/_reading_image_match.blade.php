<div class="flex items-start gap-4 p-4 rounded-lg bg-slate-50 border">
    <p class="font-bold text-slate-700 pt-2">{{ $question->order }}.</p>
    <div class="flex-1">
        @if($question->content)
            <p class="text-lg mb-2">{{ $question->content }}</p>
        @endif
        @if($question->audio_url)
            <audio controls controlsList="nodownload noremoteplayback" src="{{ $question->audio_url }}" class="h-8 mb-2"></audio>
        @endif
        
        <label for="answer_{{ $question->id }}" class="text-sm font-medium text-slate-600">Chọn đáp án:</label>
        <select name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}" class="mt-1 block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-center">
            <option value="">( )</option>
            @foreach($optionsBank as $label => $content)
                <option value="{{ $label }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>
</div>