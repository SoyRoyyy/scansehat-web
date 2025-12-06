<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <!-- PROFILE HEADER -->
        <div class="max-w-7xl mx-auto mb-10 px-6 lg:px-8">
            <div class="bg-[#DADFD1] w-full py-10 px-8 rounded-lg shadow flex items-center space-x-8">

            {{-- Foto Profil --}}
            <div class="flex flex-col items-center">
                @if(Auth::user()->profile_photo_path)
                    <img 
                        src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                        alt="Profile Photo"
                        class="w-28 h-28 rounded-full object-cover shadow"
                    >
                @else
                    {{-- Ikon foto default --}}
                    <div class="w-28 h-28 rounded-full bg-gray-300 flex items-center justify-center shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-14 h-14 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                @endif

                {{-- INPUT FILE (disembunyikan) --}}
                <form id="form-ganti-foto" action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input 
                        type="file" 
                        id="input-photo" 
                        name="photo"
                        accept="image/*"
                        class="hidden"
                        onchange="document.getElementById('form-ganti-foto').submit();"
                    >
                </form>

                {{-- Tombol yang memicu file picker --}}
                <button 
                    onclick="document.getElementById('input-photo').click();"
                    class="text-sm text-gray-700 mt-3 underline hover:text-gray-900"
                >
                    Ganti Foto
                </button>
            </div>


                {{-- Nama + Role --}}
                <div class="flex flex-col">
                    <h1 class="text-3xl font-bold text-gray-900">
                        {{ Auth::user()->name }}
                    </h1>

                    <p class="text-gray-700 text-lg mt-1">
                        Pengguna {{ Auth::user()->id }}
                    </p>
                </div>

            </div>
        </div>
        <!-- END PROFILE HEADER -->



        <!-- WRAPPER UTAMA: 2 Kolom -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-10">

            <!-- SIDEBAR KIRI -->
            <div class="w-64 space-y-3">
                <a href="#informasi-dasar" 
                    class="block bg-[#F9F8EF] text-black px-4 py-3 rounded-lg shadow font-semibold hover:bg-[#eceada] transition">
                    Informasi Dasar
                </a>

                <a href="#data-kesehatan" 
                    class="block bg-[#F9F8EF] text-black px-4 py-3 rounded-lg shadow font-semibold hover:bg-[#eceada] transition">
                    Data Kesehatan
                </a>

                <a href="#preferensi-nutrisi" 
                    class="block bg-[#F9F8EF] text-black px-4 py-3 rounded-lg shadow font-semibold hover:bg-[#eceada] transition">
                    Preferensi Nutrisi
                </a>
            </div>

            <!-- KONTEN KANAN -->
            <div class="flex-1 space-y-6">

                {{-- SECTION 1 — Informasi Dasar --}}
                <div id="informasi-dasar" class="bg-[#7C8A85] overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.informasi_dasar')
                    </div>
                </div>

                {{-- SECTION 2 — Data Kesehatan --}}
                <div id="data-kesehatan" class="bg-[#7C8A85] overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.data_kesehatan')
                    </div>
                </div>

                {{-- SECTION 3 — Preferensi Nutrisi --}}
                <div id="preferensi-nutrisi" class="bg-[#7C8A85] overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.preferensi_nutrisi')
                    </div>
                </div>

                {{-- SECTION 4 — Hapus User --}}
                <div id="hapus-user" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.hapus_user')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
