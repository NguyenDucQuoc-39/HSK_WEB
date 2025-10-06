@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <h1>Chào mừng bạn đến với HSK Web</h1>
        <p>Nền tảng luyện thi HSK trực tuyến toàn diện – thi thử, ôn tập, dịch thuật và cộng đồng học tập sinh động.</p>
        <a href="{{ route('thi-hsk') }}" class="cta-btn">Bắt đầu ngay</a>
    </div>
</section>

<!-- SHOWCASE SECTION -->
<section class="showcase">
    <div class="showcase-content">
        <h2>Thi thử, học tập, và kết nối</h2>
        <p>HSK Web mang lại trải nghiệm học tập hoàn chỉnh: làm bài thi thử chuẩn HSK, ôn từ vựng theo cấp độ và tham gia cộng đồng trao đổi kiến thức.</p>
    </div>
    <img src="{{ asset('build/assets/images/exam.jpg') }}" alt="HSK Practice">
</section>

<!-- FEATURES SECTION -->
<section class="features">
    <h2>Các tính năng nổi bật</h2>
    <div class="features-grid">
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Thi HSK">
            <h3>Thi thử HSK</h3>
            <p>Bài thi chuẩn HSK, chấm điểm tự động, giúp bạn tự đánh giá năng lực.</p>
        </div>

        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/2942/2942074.png" alt="Ôn từ vựng">
            <h3>Ôn tập từ vựng</h3>
            <p>Luyện tập từ vựng theo cấp độ HSK với flashcard thông minh.</p>
        </div>

        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" alt="Dịch và học">
            <h3>Dịch & Học</h3>
            <p>Dịch câu, tra nghĩa và ghi nhớ cách dùng từ nhanh chóng.</p>
        </div>

        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" alt="Cộng đồng">
            <h3>Cộng đồng học tập</h3>
            <p>Kết nối học viên cùng chí hướng, cùng nhau tiến bộ.</p>
        </div>
    </div>
</section>

@endsection
