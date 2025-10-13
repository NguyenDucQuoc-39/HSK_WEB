@extends('layouts.app')

@section('content')

{{-- SECTION 1: HERO --}}
<div class="relative bg-slate-900 overflow-hidden">
    {{-- Thêm ảnh nền trang trí nếu muốn --}}
    {{-- <img src="..." class="absolute inset-0 w-full h-full object-cover opacity-20"> --}}
    <div class="relative max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                <span class="block">Chinh phục HSK</span>
                <span class="block text-indigo-400">dễ dàng hơn bao giờ hết</span>
            </h1>
            <p class="mt-3 max-w-md mx-auto text-lg text-slate-300 sm:text-xl md:mt-5 md:max-w-3xl">
                Nền tảng luyện thi HSK toàn diện: thi thử, ôn tập từ vựng, dịch thuật và kết nối cộng đồng học tập sinh động.
            </p>
            <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                <div class="rounded-md shadow">
                    <a href="{{ route('thi-hsk') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition-transform transform hover:scale-105">
                        Bắt đầu học ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SECTION 2: HƯỚNG DẪN BẮT ĐẦU (HOW IT WORKS) --}}
<div class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Lộ trình của bạn</h2>
            <p class="mt-2 text-3xl font-extrabold text-slate-900 tracking-tight sm:text-4xl">
                Bắt đầu hành trình của bạn chỉ với 3 bước
            </p>
        </div>
        <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-3">
            {{-- Step 1 --}}
            <div class="text-center">
                <div class="flex items-center justify-center h-16 w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-2xl">1</div>
                <h3 class="mt-5 text-xl font-semibold text-slate-900">Thi Thử & Xác Định Trình Độ</h3>
                <p class="mt-2 text-base text-slate-500">Làm bài thi thử đầu vào để biết chính xác năng lực hiện tại của bạn và nhận lộ trình học tập được cá nhân hóa.</p>
            </div>
            {{-- Step 2 --}}
            <div class="text-center">
                <div class="flex items-center justify-center h-16 w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-2xl">2</div>
                <h3 class="mt-5 text-xl font-semibold text-slate-900">Ôn Tập Thông Minh</h3>
                <p class="mt-2 text-base text-slate-500">Sử dụng hệ thống flashcard và bài tập đa dạng để củng cố từ vựng và ngữ pháp một cách hiệu quả nhất.</p>
            </div>
            {{-- Step 3 --}}
            <div class="text-center">
                <div class="flex items-center justify-center h-16 w-16 mx-auto bg-indigo-100 text-indigo-600 rounded-full font-bold text-2xl">3</div>
                <h3 class="mt-5 text-xl font-semibold text-slate-900">Giao Lưu & Tiến Bộ</h3>
                <p class="mt-2 text-base text-slate-500">Tham gia cộng đồng, đặt câu hỏi, và trao đổi kinh nghiệm với hàng ngàn học viên khác để cùng nhau tiến bộ.</p>
            </div>
        </div>
    </div>
</div>

{{-- SECTION 3: TÍNH NĂNG (FEATURES) --}}
<div class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Tính năng</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Một nền tảng học tập toàn diện
            </p>
        </div>
        <div class="mt-12">
            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-x-8 md:gap-y-10">
                {{-- Feature 1 --}}
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-slate-900">Thi thử HSK</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-slate-500">Bài thi chuẩn HSK, chấm điểm tự động, giúp bạn tự đánh giá năng lực.</dd>
                </div>
                {{-- Feature 2 --}}
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 8.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v8.25A2.25 2.25 0 006 16.5h2.25m8.25-8.25H18a2.25 2.25 0 012.25 2.25v8.25A2.25 2.25 0 0118 20.25h-7.5A2.25 2.25 0 018.25 18v-1.5m8.25-8.25h-6a2.25 2.25 0 00-2.25 2.25v6" /></svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-slate-900">Ôn Tập Từ Vựng</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-slate-500">Flashcard thông minh và bài tập đa dạng giúp ghi nhớ từ vựng hiệu quả.</dd>
                </div>
                 {{-- Feature 3 --}}
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" /></svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-slate-900">Công Cụ Dịch</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-slate-500">Dịch câu, tra nghĩa và lưu lại các từ mới để ôn tập ngay lập tức.</dd>
                </div>
                 {{-- Feature 4 --}}
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962A3 3 0 013 11.175l-2.162 2.162a3 3 0 01-2.72 4.682 9.095 9.095 0 003.74.478m12.01-3.644a3 3 0 01-3.26 3.26l-2.162-2.162a3 3 0 014.682-2.72 9.095 9.095 0 00-.478-3.74zM12 12a3 3 0 013 3l-2.162 2.162a3 3 0 01-2.72-4.682A9.095 9.095 0 0012 12z" /></svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-slate-900">Cộng Đồng Học Tập</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-slate-500">Kết nối, trao đổi kinh nghiệm và cùng nhau tiến bộ với cộng đồng năng động.</dd>
                </div>
            </dl>
        </div>
    </div>
</div>

{{-- SECTION 4: HỌC VIÊN NÓI GÌ (TESTIMONIALS) --}}
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Đánh giá</h2>
            <p class="mt-2 text-3xl font-extrabold text-slate-900 tracking-tight sm:text-4xl">
                Học viên nói gì về chúng tôi
            </p>
        </div>
        <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            {{-- Testimonial Card 1 --}}
            <div class="bg-slate-50 p-8 rounded-xl shadow-md">
                <p class="text-slate-600">"Giao diện thân thiện, nội dung bám sát đề thi thật. Nhờ HSK Web mà mình đã tự tin đạt HSK 5!"</p>
                <div class="mt-4 flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760365632/anh13_ctrysm.jpg" alt="Avatar">
                    <div class="ml-4">
                        <p class="font-semibold text-slate-900">Nguyễn Đức Quốc</p>
                        <p class="text-slate-500 text-sm">Sinh viên Đại Học Phenikaa, Hà Nội</p>
                    </div>
                </div>
            </div>
            {{-- Testimonial Card 2 --}}
            <div class="bg-slate-50 p-8 rounded-xl shadow-md">
                <p class="text-slate-600">"Tính năng flashcard và ôn tập từ vựng rất thông minh. Mình có thể học mọi lúc mọi nơi trên điện thoại."</p>
                <div class="mt-4 flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760365632/anh14_h1eibw.jpg" alt="Avatar">
                    <div class="ml-4">
                        <p class="font-semibold text-slate-900">Đặng Thanh Huyền</p>
                        <p class="text-slate-500 text-sm">Sinh viên Đại Học Phenikaa, Hà Nội</p>
                    </div>
                </div>
            </div>
            {{-- Testimonial Card 3 --}}
            <div class="bg-slate-50 p-8 rounded-xl shadow-md">
                <p class="text-slate-600">"Cộng đồng học tập rất hữu ích. Mình đã được giải đáp nhiều thắc mắc và có thêm động lực học mỗi ngày."</p>
                <div class="mt-4 flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760365385/anh9_twrsgx.jpg" alt="Avatar">
                    <div class="ml-4">
                        <p class="font-semibold text-slate-900">Nguyễn Anh Duy</p>
                        <p class="text-slate-500 text-sm">Sinh viên Đại Học Kinh Tế Hà Nội</p>
                    </div>
                </div>
            </div>

            {{-- Testimonial Card 4 --}}
            <div class="bg-slate-50 p-8 rounded-xl shadow-md">
                <p class="text-slate-600">"Trang web rất dễ sử dụng, các bài thi thử và tài liệu ôn tập cực kỳ sát thực tế. Mình đã tiến bộ rõ rệt chỉ sau 2 tháng luyện tập!"</p>
                <div class="mt-4 flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760365386/anh12_xnl5zg.jpg" alt="Avatar">
                    <div class="ml-4">
                        <p class="font-semibold text-slate-900">Hoàng Thu Hồng</p>
                        <p class="text-slate-500 text-sm">Sinh viên Đại Học Luật, Đại Học Quốc Gia Hà Nội</p>
                    </div>
                </div>
            </div>
            {{-- Testimonial Card 5 --}}
            <div class="bg-slate-50 p-8 rounded-xl shadow-md">
                <p class="text-slate-600">"Nhờ hệ thống luyện thi và cộng đồng hỗ trợ nhiệt tình, mình đã cải thiện kỹ năng tiếng Trung nhanh chóng và đạt kết quả cao ngoài mong đợi."</p>
                <div class="mt-4 flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760365385/anh10_ntsowj.jpg" alt="Avatar">
                    <div class="ml-4">
                        <p class="font-semibold text-slate-900">Nguyễn Tùng Lâm</p>
                        <p class="text-slate-500 text-sm">Sinh viên Đại Học Bách Khoa Hà Nội</p>
                    </div>
                </div>
            </div>
            {{-- Testimonial Card 6 --}}
            <div class="bg-slate-50 p-8 rounded-xl shadow-md">
                <p class="text-slate-600">"Mình rất ấn tượng với tính năng dịch và lưu từ mới. Nhờ đó, vốn từ của mình tăng lên rõ rệt sau mỗi buổi học!"</p>
                <div class="mt-4 flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760365385/anh11_gvuebk.jpg" alt="Avatar">
                    <div class="ml-4">
                        <p class="font-semibold text-slate-900">Hoàng Công Tấn</p>
                        <p class="text-slate-500 text-sm">Sinh viên Đại Học FPT</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SECTION 5: CALL TO ACTION (CTA) --}}
<div class="bg-indigo-700">
    <div class="max-w-4xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
            <span class="block">Sẵn sàng để chinh phục HSK?</span>
        </h2>
        <p class="mt-4 text-lg leading-6 text-indigo-200">
            Tạo tài khoản miễn phí và bắt đầu hành trình của bạn ngay hôm nay.
        </p>
        <a href="{{ route('register') }}" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
            Đăng ký ngay
        </a>
    </div>
</div>
@endsection