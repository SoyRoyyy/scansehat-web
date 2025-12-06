<x-app-layout>

    <!-- WRAPPER KONTEN AGAR DI DEPAN BACKGROUND -->

    <div class="w-full flex flex-col items-center mt-24">

        <!-- Judul -->
        <h1 class="text-[40px] font-semibold text-center">
            Upload Foto Label Nutrisi
        </h1>

        <!-- Deskripsi -->
        <p class="text-[20px] text-center mt-4 max-w-2xl">
            Upload foto label nutrisi produk makanan/minuman untuk mengetahui apakah produk tersebut sesuai dengan kebutuhan tubuhmu.

        <!-- KOTAK WRAPPER -->
        <div class="mt-10 bg-[#7A8885] w-[85%] max-w-4xl h-72 rounded-3xl 
                    flex flex-col items-center justify-center">

            <!-- Tombol Upload Image -->
            <button 
                onclick="document.getElementById('uploadInput').click()"
                class="bg-[#f3f2dc] px-16 py-10 rounded-2xl shadow-md text-xl font-semibold 
                    flex items-center gap-3 hover:scale-105 transition">
                
                Upload Image
                
                <!-- Ikon kecil -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" 
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 16l5-5a2 2 0 012.828 0l4 4a2 2 0 002.829 0L21 12M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </button>

            <!-- Hidden Input File -->
            <input 
                type="file" 
                id="uploadInput" 
                accept="image/png, image/jpeg, image/jpg, image/heic"
                class="hidden"
                onchange="handleFile(this)">

                <script>
                function handleFile(input) {
                    const file = input.files[0];
                    if (file) {
                        console.log("File yang dipilih:", file.name);
                        // kalau ingin langsung upload → panggil fungsi upload di sini
                    }
                }
                </script>

            <!-- Teks di bawah tombol -->
            <p class="text-[20px] text-center text-black mt-4">
                File harus berupa PNG/JPG/JPEG/HEIC
            </p>

        </div>

            <!-- Tombol di bawah Upload Image -->
        <div class="flex gap-6 mt-10">

            <!-- Dropdown Pengguna -->
            <div x-data="{ open:false, selected:'Pengguna 1' }" class="relative">

                <!-- Tombol -->
                <button 
                    @click="open = !open"
                    class="bg-[#f3f2dc] px-6 py-3 rounded-xl shadow-md text-sm font-semibold flex items-center gap-2 min-w-[150px] justify-between"
                >
                    <span x-text="selected"></span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        :class="open ? 'rotate-180' : ''"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <div 
                    x-show="open"
                    @click.outside="open = false"
                    class="absolute left-0 mt-2 w-60 bg-[#f3f2dc] shadow-lg rounded-xl p-4 z-50"
                    x-transition
                >

                    <!-- Pengguna 1 -->
                    <label class="flex items-center gap-3 py-2 cursor-pointer">
                        <input type="radio" name="user" value="Pengguna 1"
                            @change="selected='Pengguna 1'; open=false"
                            class="w-4 h-4"
                            checked
                        >
                        <span class="text-sm font-medium">Pengguna 1 (Utama)</span>
                    </label>

                    <!-- Pengguna 2 -->
                    <label class="flex items-center gap-3 py-2 cursor-pointer">
                        <input type="radio" name="user" value="Pengguna 2"
                            @change="selected='Pengguna 2'; open=false"
                            class="w-4 h-4"
                        >
                        <span class="text-sm font-medium">Pengguna 2</span>
                    </label>

                </div>

            </div>

            <!-- Tombol Scan Image -->
            <a href="{{ route('dashboard') }}"
                class="bg-[#f3f2dc] px-6 py-3 rounded-xl shadow-md text-sm font-semibold flex items-center gap-2">

                Scan Image

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" 
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 7V5a2 2 0 012-2h2M21 7V5a2 2 0 00-2-2h-2M3 17v2a2 2 0 002 2h2M21 17v2a2 2 0 01-2 2h-2M7 12h.01M12 12h.01M17 12h.01" />
                </svg>
            </a>
        </div>
    </div>
</x-app-layout>
