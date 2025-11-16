<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Konfirmasi Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Tinggi & Berat Badan -->
        <div class="mt-4 grid grid-cols-2 gap-4">
            <div>
                <x-input-label for="tinggi" :value="__('Tinggi Badan (cm)')" />
                <x-text-input id="tinggi" class="block mt-1 w-full" type="number" name="tinggi" :value="old('tinggi')" required />
                <x-input-error :messages="$errors->get('tinggi')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="berat" :value="__('Berat Badan (kg)')" />
                <x-text-input id="berat" class="block mt-1 w-full" type="number" name="berat" :value="old('berat')" required />
                <x-input-error :messages="$errors->get('berat')" class="mt-2" />
            </div>
        </div>

        <!-- Riwayat Penyakit -->
        <div class="mt-4">
            <x-input-label for="riwayat_penyakit" :value="__('Riwayat Penyakit')" />
            <textarea id="riwayat_penyakit" name="riwayat_penyakit" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ old('riwayat_penyakit') }}</textarea>
            <x-input-error :messages="$errors->get('riwayat_penyakit')" class="mt-2" />
        </div>

        <!-- Alergi Makanan -->
        <div class="mt-4">
            <x-input-label for="alergi_status" :value="__('Apakah Anda memiliki alergi makanan?')" />
            <select id="alergi_status" name="alergi_status" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="tidak" {{ old('alergi_status')=='tidak'?'selected':'' }}>Tidak</option>
                <option value="ya" {{ old('alergi_status')=='ya'?'selected':'' }}>Ya</option>
            </select>
            <x-input-error :messages="$errors->get('alergi_status')" class="mt-2" />
        </div>

        <!-- Detail Alergi -->
        <div class="mt-4" id="alergi_detail" style="{{ old('alergi_status')=='ya' ? '' : 'display:none;' }}">
            <x-input-label for="alergi_detail" :value="__('Sebutkan Alergi Makanan')" />
            <x-text-input id="alergi_detail" class="block mt-1 w-full" type="text" name="alergi_detail" :value="old('alergi_detail')" />
            <x-input-error :messages="$errors->get('alergi_detail')" class="mt-2" />
        </div>

        <!-- Syarat & Ketentuan -->
        <div class="mt-4 flex items-center">
            <input id="terms" type="checkbox" name="terms" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('terms') ? 'checked' : '' }} required>
            <label for="terms" class="ml-2 text-sm text-gray-600">
                Saya setuju dengan <a href="#" class="underline text-blue-500">Syarat dan Ketentuan</a>
            </label>
            <x-input-error :messages="$errors->get('terms')" class="mt-2" />
        </div>

        <!-- Tombol Daftar -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script Alergi -->
    <script>
        const alergiSelect = document.getElementById('alergi_status');
        const alergiDetail = document.getElementById('alergi_detail');
        if (alergiSelect && alergiDetail) {
            alergiSelect.addEventListener('change', function() {
                alergiDetail.style.display = this.value === 'ya' ? 'block' : 'none';
            });
        }
    </script>
</x-guest-layout>
