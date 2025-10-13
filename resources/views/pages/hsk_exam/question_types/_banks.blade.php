<div class="mb-8 p-4 bg-slate-100 rounded-lg border">
    <h3 class="font-semibold text-slate-700 mb-4">{{ $title }}</h3>

    {{-- Nếu ngân hàng chứa URL hình ảnh --}}
    @if (Str::contains($title, 'hình ảnh'))
        <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
            @foreach($bank as $label => $imageUrl)
                <div class="text-center">
                    <img src="{{ $imageUrl }}" class="rounded-md shadow-sm w-full aspect-square object-cover">
                    <p class="mt-2 font-bold text-slate-800">{{ $label }}</p>
                </div>
            @endforeach
        </div>
    {{-- Nếu ngân hàng chứa từ/câu --}}
    @elseif (Str::contains($title, 'lựa chọn'))
        <ul class="space-y-2">
            @foreach($bank as $label => $content)
                <li><strong>{{ $label }}.</strong> {{ $content }}</li>
            @endforeach
        </ul>
    @else
        <div class="flex flex-wrap gap-x-6 gap-y-2">
            @foreach($bank as $label => $content)
                <span><strong>{{ $label }}.</strong> {{ $content }}</span>
            @endforeach
        </div>
    @endif
</div>