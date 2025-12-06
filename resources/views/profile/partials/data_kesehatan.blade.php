<section class="p-6">
    <header class="mb-6">
        <h2 class="text-2xl font-semibold text-[#f5f5dc]">Data Kesehatan</h2>
    </header>

    <form method="post" action="{{ route('profile.update.health') }}">
    @csrf

        {{-- KONDISI KESEHATAN --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Kondisi Kesehatan Tertentu</label>
            <input
                type="text"
                name="kondisi_kesehatan"
                value="{{ old('kondisi_kesehatan', $user->kondisi_kesehatan) }}"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
                placeholder="Contoh: Diabetes, Hipertensi"
            >
        </div>

        {{-- ALERGI MAKANAN --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Alergi Makanan</label>
            <select
                name="alergi_makanan"
                id="alergi_makanan"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
            >
                <option value="Tidak" {{ $user->alergi_makanan == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                <option value="Ya" {{ $user->alergi_makanan == 'Ya' ? 'selected' : '' }}>Ya</option>
            </select>
        </div>

        {{-- ALERGI DETAIL --}}
        <div id="alergi_detail_wrapper">
            <label class="text-[#7C8A85] font-medium">Alergi Detail (Jika Ya)</label>
            <input
                type="text"
                name="alergi_detail"
                value="{{ old('alergi_detail', $user->alergi_detail) }}"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none"
                placeholder="Contoh: Seafood, kacang"
            >
        </div>

        {{-- MAKANAN BIASA --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Makanan yang Biasa Dikonsumsi</label>
            <textarea
                name="makanan_biasa"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none h-20"
                placeholder="Contoh: Wagyu, Salmon, Dori"
            >{{ old('makanan_biasa', $user->makanan_biasa) }}</textarea>
        </div>

        {{-- DESKRIPSI UMUM --}}
        <div>
            <label class="text-[#f5f5dc] font-medium">Kondisi Kesehatan Secara Umum</label>
            <textarea
                name="deskripsi_kesehatan"
                class="mt-1 w-full bg-[#f5f5dc] p-2 rounded-md focus:outline-none h-40"
                placeholder="Jelaskan kondisi kesehatan..."
            >{{ old('deskripsi_kesehatan', $user->deskripsi_kesehatan) }}</textarea>
        </div>

        {{-- BUTTON SAVE --}}
        <div class="pt-4">
            <button class="px-5 py-2 bg-[#A9B388] text-white rounded-md hover:bg-[#8d9a6c]">
                Simpan Perubahan
            </button>

            @if (session('status') === 'health-updated')
                <span class="text-[#7C8A85] ml-3">Tersimpan.</span>
            @endif
        </div>
    </form>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const alergiSelect = document.getElementById('alergi_makanan');
    const detailWrapper = document.getElementById('alergi_detail_wrapper');

    function toggleDetail() {
        detailWrapper.style.display = alergiSelect.value === 'Ya' ? 'block' : 'none';
    }

    alergiSelect.addEventListener('change', toggleDetail);
    toggleDetail();
});
</script>
