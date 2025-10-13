<div class="flex items-start gap-4 p-4 rounded-lg bg-slate-50 border">
    <p class="font-bold text-slate-700 pt-2">{{ $question->order }}.</p>
    <div class="flex-1">
        <p class="text-lg">{{ $question->content }}</p>
        <label for="answer_{{ $question->id }}" class="sr-only">Chọn đáp án cho câu {{ $question->order }}</label>
        <select name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}" class="mt-2 block w-24 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-center">
            <option value="">( )</option>
            @foreach($optionsBank as $label => $content)
                <option value="{{ $label }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>
</div>