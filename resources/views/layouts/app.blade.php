{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-g">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HSK Web') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-slate-800">
    <div class="flex flex-col min-h-screen">
        {{-- Header --}}
        @auth
            @include('layouts.navigation')
        @endauth

        {{-- Nội dung chính của từng trang sẽ được nạp vào đây --}}
        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- Footer chung cho toàn bộ trang web --}}
        <footer class="bg-slate-800 text-slate-300">
    {{-- Phần nội dung chính của footer --}}
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center md:text-left">

        {{-- Cột 1: Logo và Giới thiệu --}}
        <div class="flex flex-col items-center md:items-start space-y-4">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('build/assets/images/logo.png') }}" alt="Logo HSK" class="h-10">
            </a>
            <p class="text-sm text-slate-400">
                Nền tảng luyện thi HSK trực tuyến.<br>
                Nơi học tập, ôn luyện và giao lưu.
            </p>
        </div>

        {{-- Cột 2: Các liên kết sản phẩm/tính năng --}}
        <div>
            <h3 class="font-bold text-white text-base mb-4 tracking-wider uppercase">Sản phẩm</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('thi-hsk') }}" class="text-slate-400 hover:text-indigo-400 transition">Thi HSK</a></li>
                <li><a href="{{ route('on-tap') }}" class="text-slate-400 hover:text-indigo-400 transition">Ôn Tập Từ Vựng</a></li>
                <li><a href="{{ route('dich') }}" class="text-slate-400 hover:text-indigo-400 transition">Công Cụ Dịch</a></li>
                <li><a href="{{ route('cong-dong') }}" class="text-slate-400 hover:text-indigo-400 transition">Cộng Đồng</a></li>
            </ul>
        </div>

        {{-- Cột 3: Các liên kết hỗ trợ --}}
        <div>
            <h3 class="font-bold text-white text-base mb-4 tracking-wider uppercase">Hỗ trợ</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="text-slate-400 hover:text-indigo-400 transition">Câu Hỏi Thường Gặp</a></li>
                <li><a href="#" class="text-slate-400 hover:text-indigo-400 transition">Trung Tâm Trợ Giúp</a></li>
                <li><a href="#" class="text-slate-400 hover:text-indigo-400 transition">Điều Khoản Dịch Vụ</a></li>
                <li><a href="#" class="text-slate-400 hover:text-indigo-400 transition">Chính Sách Bảo Mật</a></li>
            </ul>
        </div>

        {{-- Cột 4: Thông tin liên hệ và mạng xã hội --}}
        <div>
            <h3 class="font-bold text-white text-base mb-4 tracking-wider uppercase">Kết nối</h3>
            <div class="flex justify-center md:justify-start space-x-4 mb-4">
                {{-- Facebook Icon --}}
                <a href="https://facebook.com" target="_blank" class="text-slate-400 hover:text-white transition">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>
                {{-- YouTube Icon --}}
                <a href="https://youtube.com" target="_blank" class="text-slate-400 hover:text-white transition">
                     <span class="sr-only">YouTube</span>
                     <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.78 22 12 22 12s0 3.22-.42 4.814a2.506 2.506 0 0 1-1.768 1.768c-1.594.42-7.812.42-7.812.42s-6.218 0-7.812-.42a2.506 2.506 0 0 1-1.768-1.768C2 15.22 2 12 2 12s0-3.22.42-4.814a2.506 2.506 0 0 1 1.768-1.768C5.782 5 12 5 12 5s6.218 0 7.812.418ZM15.197 12 10 9.142v5.716L15.197 12Z" clip-rule="evenodd" />
                    </svg>
                </a>
                {{-- Zalo Icon (ví dụ - bạn có thể thay bằng SVG thật của Zalo) --}}
                <a href="https://zalo.me" target="_blank" class="text-slate-400 hover:text-white transition">
                     <span class="sr-only">Zalo</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1.5-5.5l-2-2-1.5 1.5 3.5 3.5 8-8-1.5-1.5-6.5 6.5z"/>
                    </svg>
                </a>
            </div>
            <div class="space-y-1 text-sm">
                <p>Email: <a href="mailto:hskweb@gmail.com" class="text-slate-400 hover:text-indigo-400 transition">hskweb@gmail.com</a></p>
                <p>Hotline: <strong class="text-white">0123 456 789</strong></p>
            </div>
        </div>
    </div>

    {{-- Phần đáy của footer --}}
    <div class="bg-slate-900 py-4">
        <p class="text-center text-xs text-slate-500">© {{ date('Y') }} HSK Web. All Rights Reserved.</p>
    </div>
</footer>
    </div>
</body>
</html>