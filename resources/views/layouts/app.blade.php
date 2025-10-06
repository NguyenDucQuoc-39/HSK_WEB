<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HSK Web') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">

    <div class="flex flex-col min-h-screen">
        {{-- Header --}}
        @auth
            @include('layouts.navigation')
        @endauth

        {{-- Nội dung chính --}}
        <main class="flex-1">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-section">
                    <img src="{{ asset('build/assets/images/logo.png') }}" alt="Logo HSK" class="footer-logo">
                    <p class="footer-desc">
                        Ứng dụng luyện thi HSK trực tuyến.<br>
                        Nơi học tập, ôn luyện và giao lưu cộng đồng.
                    </p>
                </div>

                <div class="footer-section">
                    <h3>Liên hệ</h3>
                    <p>Email: <a href="mailto:hskweb@gmail.com">hskweb@gmail.com</a></p>
                    <p>Hotline: <strong>0123 456 789</strong></p>
                </div>

                <div class="footer-section">
                    <h3>Kết nối với chúng tôi</h3>
                    <div class="social-icons">
                        <a href="https://facebook.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
                        <a href="https://zalo.me" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/5968/5968841.png" alt="Zalo"></a>
                        <a href="https://youtube.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" alt="YouTube"></a>
                        <a href="https://tiktok.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/3046/3046123.png" alt="TikTok"></a>
                        <a href="https://instagram.com" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram"></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                © 2025 HSK Web. Tất cả quyền được bảo lưu.
            </div>
        </footer>
    </div>

</body>
</html>
