@props(['active'])
@php
$classes = ($active ?? false)
            ? 'inline-flex items-center text-sm font-semibold text-indigo-600 border-b-2 border-indigo-600 transition-colors'
            : 'inline-flex items-center text-sm font-medium text-slate-600 hover:text-slate-800 border-b-2 border-transparent hover:border-slate-300 transition-colors';
@endphp
<a {{ $attributes->merge(['class' => $classes . ' h-16']) }}>
    {{ $slot }}
</a>