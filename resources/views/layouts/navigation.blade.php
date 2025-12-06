<nav x-data="{ open: false }" class="bg-[#7A8885] text-white shadow">
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-16">

            {{-- LEFT : Logo + Nama --}}
            <div class="flex items-center space-x-3">
                <a href="{{ url('/dashboard') }}" class="flex items-center">
                    <img src="/images/logo.png" alt="Logo" class="h-10 w-10 me-2">
                    <span class="text-lg font-bold">ScanSehatin</span>
                </a>
            </div>

            {{-- RIGHT : Menu + Profile (rata kanan) --}}
            <div class="hidden sm:flex items-center space-x-8">

                <a href="{{ url('/dashboard') }}"
                    class="font-semibold {{ request()->is('dashboard') ? 'text-yellow-300' : 'text-white' }}">
                    Beranda
                </a>

                <a href="{{ url('/forum') }}"
                    class="font-semibold {{ request()->is('forum') ? 'text-yellow-300' : 'text-white' }}">
                    Forum
                </a>

                <a href="{{ url('/riwayat') }}"
                    class="font-semibold {{ request()->is('riwayat') ? 'text-yellow-300' : 'text-white' }}">
                    Riwayat
                </a>

                <a href="{{ url('/pengaturan') }}"
                    class="font-semibold {{ request()->is('pengaturan') ? 'text-yellow-300' : 'text-white' }}">
                    Pengaturan
                </a>

                {{-- Dropdown Profile --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-2 py-1 border border-white/20 rounded-md bg-white/10 text-white hover:bg-white/20 transition">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ms-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a1 1 0 011.4 0L10 10.58l3.37-3.37a1 1 0 011.4 1.42l-4.08 4.08a1 1 0 01-1.4 0L5.23 8.63a1 1 0 010-1.42z"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            </div>

            {{-- Mobile --}}
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open"
                    class="p-2 text-white hover:bg-white/20 rounded transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor">
                        <path :class="{'hidden': open, 'inline-flex': ! open}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</nav>
