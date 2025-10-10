<nav x-data="{ open: false }" class="bg-black text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('build/assets/images/logo.png') }}" alt="Logo" class="h-9 w-auto">
                </a>
            </div>

            <!-- Menu Links -->
            <div class="hidden sm:flex space-x-6 ">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
                    {{ __('Trang Chủ') }}
                </x-nav-link>
                <x-nav-link :href="route('thi-hsk')" :active="request()->routeIs('thi-hsk')" class="nav-link">
                    {{ __('Thi HSK') }}
                </x-nav-link>
                <x-nav-link :href="route('on-tap')" :active="request()->routeIs('on-tap')" class="nav-link">
                    {{ __('Ôn Tập Từ Vựng') }}
                </x-nav-link>
                <x-nav-link :href="route('dich')" :active="request()->routeIs('dich')" class="nav-link">
                    {{ __('Dịch') }}
                </x-nav-link>
                <x-nav-link :href="route('cong-dong')" :active="request()->routeIs('cong-dong')" class="nav-link">
                    {{ __('Cộng Đồng') }}
                </x-nav-link>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex items-center space-x-3">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center user-button">
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="ml-1 w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 20 20">...</svg>
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

            <!-- Hamburger Menu -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="text-gray-200 focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden bg-black border-t border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Trang Chủ') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('thi-hsk')" :active="request()->routeIs('thi-hsk')">
                {{ __('Thi HSK') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('on-tap')" :active="request()->routeIs('on-tap')">
                {{ __('Ôn Tập Từ Vựng') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dich')" :active="request()->routeIs('dich')">
                {{ __('Dịch') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cong-dong')" :active="request()->routeIs('cong-dong')">
                {{ __('Cộng Đồng') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Hồ sơ cá nhân') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Đăng xuất') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
