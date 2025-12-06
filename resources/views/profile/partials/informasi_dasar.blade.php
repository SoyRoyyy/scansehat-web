<section class="p-6">
    <header class="mb-6">
        <h2 class="text-2xl font-semibold text-[#f5f5dc]">Informasi Dasar</h2>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- NAMA LENGKAP --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Nama Lengkap</label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
                required
            >
        </div>

        {{-- EMAIL --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
                required
            >
        </div>

        {{-- TINGGI & BERAT --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-[#f5f5dc] font-medium">Tinggi Badan (cm)</label>
                <input
                    type="number"
                    name="tinggi"
                    value="{{ old('tinggi', $user->tinggi) }}"
                    class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
                >
            </div>

            <div>
                <label class="text-[#f5f5dc] font-medium">Berat Badan (kg)</label>
                <input
                    type="number"
                    name="berat"
                    value="{{ old('berat', $user->berat) }}"
                    class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
                >
            </div>
        </div>

        {{-- TANGGAL LAHIR --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Tanggal Lahir</label>
            <div class="grid grid-cols-3 gap-3 mt-1">
                <input type="number" name="lahir_hari" placeholder="Hari"
                       value="{{ old('lahir_hari', $user->lahir_hari) }}"
                       class="bg-[#f5f5dc] p-2 rounded-md focus:outline-none">

                <input type="number" name="lahir_bulan" placeholder="Bulan"
                       value="{{ old('lahir_bulan', $user->lahir_bulan) }}"
                       class="bg-[#f5f5dc] p-2 rounded-md focus:outline-none">

                <input type="number" name="lahir_tahun" placeholder="Tahun"
                       value="{{ old('lahir_tahun', $user->lahir_tahun) }}"
                       class="bg-[#f5f5dc] p-2 rounded-md focus:outline-none">
            </div>
        </div>

        {{-- JENIS KELAMIN --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Jenis Kelamin</label>
            <select
                name="jenis_kelamin"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
            >
                <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- BUTTON SAVE --}}
        <div class="pt-4">
            <button class="px-5 py-2 bg-[#A9B388] text-white rounded-md hover:bg-[#8d9a6c]">
                Simpan Perubahan
            </button>
        </div>

    </form>
</section>
