<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-slate-200">
    {{-- Thêm class 'relative' vào container chính để căn giữa menu links --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex justify-between h-16 items-center">

            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('build/assets/images/logo.png') }}" alt="Logo" class="h-9 w-auto">
                </a>
            </div>

            {{-- CẢI TIẾN: Các lớp này giúp căn giữa tuyệt đối menu links, tạo sự cân đối --}}
            <div class="hidden sm:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                <div class="flex space-x-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Trang Chủ') }}</x-nav-link>
                    <x-nav-link :href="route('thi-hsk')" :active="request()->routeIs('thi-hsk')">{{ __('Thi HSK') }}</x-nav-link>
                    <x-nav-link :href="route('on-tap')" :active="request()->routeIs('on-tap')">{{ __('Ôn Tập Từ Vựng') }}</x-nav-link>
                    <x-nav-link :href="route('dich')" :active="request()->routeIs('dich')">{{ __('Dịch') }}</x-nav-link>
                    <x-nav-link :href="route('cong-dong')" :active="request()->routeIs('cong-dong')">{{ __('Cộng Đồng') }}</x-nav-link>
                </div>
            </div>

            <div class="flex items-center">
                {{-- SỬA LỖI: Khối User Dropdown được đặt đúng vị trí ở đây --}}
                <div class="hidden sm:flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-slate-600 bg-slate-100 hover:text-slate-800 focus:outline-none transition">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Hồ sơ cá nhân') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Đăng xuất') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="flex items-center sm:hidden ml-4">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-600 hover:bg-slate-100 focus:outline-none transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Trang Chủ') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('thi-hsk')" :active="request()->routeIs('thi-hsk')">{{ __('Thi HSK') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('on-tap')" :active="request()->routeIs('on-tap')">{{ __('Ôn Tập Từ Vựng') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dich')" :active="request()->routeIs('dich')">{{ __('Dịch') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cong-dong')" :active="request()->routeIs('cong-dong')">{{ __('Cộng Đồng') }}</x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-slate-200">
            <div class="px-4">
                <div class="font-medium text-base text-slate-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">{{ __('Hồ sơ cá nhân') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Đăng xuất') }}</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>