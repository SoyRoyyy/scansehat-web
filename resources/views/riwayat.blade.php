<x-app-layout>
    <div class="w-full flex flex-col items-center mt-24">

        <!-- FILTER HARI INI / MINGGUAN / BULANAN -->
        <div class="flex items-center gap-3 mb-5 bg-[#AEB7AF] p-1 rounded-full">
            
            <!-- Tombol terpilih -->
            <button class="px-6 py-2 rounded-full text-sm 
                bg-[#D7DBD8] text-gray-700 border border-gray-300 shadow-sm">
                Hari Ini
            </button>

            <!-- Tombol tidak terpilih -->
            <button class="px-6 py-2 rounded-full text-sm 
                bg-[#AEB7AF] text-gray-700">
                Mingguan
            </button>

            <!-- Tombol tidak terpilih -->
            <button class="px-6 py-2 rounded-full text-sm 
                bg-[#AEB7AF] text-gray-700">
                Bulanan
            </button>
        </div>


        <!-- WRAPPER KUNING -->
        <div class="w-[95%] max-w-6xl bg-[#FFF7E0] rounded-3xl p-8 shadow-sm">

        <!-- JUDUL + SEARCH BAR -->
        <div class="flex items-center justify-between mb-6">

            <h1 class="text-[20px] font-semibold">
                Daftar Riwayat Scan / Upload Label Nutrisi
            </h1>

        <!-- SEARCH BAR -->
        <div class="flex items-center bg-white rounded-full px-4 py-2 w-64 shadow-sm">
            
            <!-- IKON SEARCH -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                stroke="#6D7A75" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>

            <input 
                type="text" 
                placeholder="Cari"
                class="w-full outline-none border-none text-sm text-gray-600 placeholder-gray-400">
        </div>
    </div>  

        <!-- TABEL + FILTER -->
        <div class="overflow-x-auto mt-5">
            <table class="w-full text-sm border-separate border-spacing-0">
                
                <!-- FILTER DI ATAS KOLOM -->
                <thead>
                    <tr class="bg-[#FFF7E0]">
                        <th class="px-4 py-3 w-10"></th>
                        <th class="px-4 py-3"></th>

                        <!-- Filter Pengguna -->
                        <th class="px-4 py-3 w-32">
                            <select class="w-full px-3 py-1.5 rounded-lg bg-white border text-xs">
                                <option>Pengguna</option>
                                <option>Pengguna 1</option>
                                <option>Pengguna 2</option>
                            </select>
                        </th>

                        <!-- Filter Tanggal -->
                        <th class="px-4 py-3 w-40">
                            <select class="w-full px-3 py-1.5 rounded-lg bg-white border text-xs">
                                <option>Tanggal</option>
                            </select>
                        </th>

                        <!-- Filter Status -->
                        <th class="px-4 py-3 w-32">
                            <select class="w-full px-3 py-1.5 rounded-lg bg-white border text-xs">
                                <option>Status</option>
                                <option>Aman Dikonsumsi</option>
                                <option>Perlu Perhatian</option>
                                <option>Dilarang Dikonsumsi</option>
                            </select>
                        </th>

                        <th class="px-4 py-3 w-20"></th>
                    </tr>

                    <!-- HEADER KOLOM -->
                    <tr class="bg-[#FFF4C2] text-gray-700">
                        <th class="px-4 py-3 border-b border-gray-300"></th>
                        <th class="px-4 py-3 border-b border-gray-300 border-l">Produk</th>
                        <th class="px-4 py-3 border-b border-gray-300 border-l">Pengguna</th>
                        <th class="px-4 py-3 border-b border-gray-300 border-l">Tanggal</th>
                        <th class="px-4 py-3 border-b border-gray-300 border-l">Status</th>
                        <th class="px-4 py-3 border-b border-gray-300 border-l">Aksi</th>
                    </tr>
                </thead>

                <!-- TABEL BODY -->
                <tbody class="divide-y divide-gray-300">
                    <tr class="hover:bg-[#FFEDAE] transition">
                        <td colspan="6" class="text-center py-10 text-gray-500">
                            Tidak ada data untuk ditampilkan.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
