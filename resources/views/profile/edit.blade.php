@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Tiêu đề trang -->
        <h2 class="font-semibold text-2xl text-gray-800 text-center mb-8">
            {{ __('Chỉnh sửa hồ sơ cá nhân') }}
        </h2>

        <!-- Thông tin người dùng -->
        <div class="p-6 bg-white shadow-md sm:rounded-lg">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Đổi mật khẩu -->
        <div class="p-6 bg-white shadow-md sm:rounded-lg">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Xóa tài khoản -->
        <div class="p-6 bg-white shadow-md sm:rounded-lg mb-12">
            <div class="max-w-xl mx-auto">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection
