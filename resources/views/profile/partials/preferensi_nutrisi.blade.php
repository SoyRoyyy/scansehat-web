<section class="p-6">

    <h2 class="text-2xl font-semibold mb-5 text-[#f5f5dc]">
        Preferensi Nutrisi
    </h2>

    <form method="POST" action="{{ route('profile.update.preferensi_nutrisi') }}" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- JENIS DIET --}}
            <div>
                <label for="jenis_diet" class="block text-sm font-medium text-[#f5f5dc] mb-1">
                    Jenis Diet
                </label>
                <input
                    type="text"
                    id="jenis_diet"
                    name="jenis_diet"
                    value="{{ old('jenis_diet', $user->jenis_diet) }}"
                    class="w-full rounded-md bg-[#f5f5dc] p-2 focus:outline-none"
                    placeholder="Contoh: Low Carb, Mediterranian, Vegan"
                >
            </div>

            {{-- TUJUAN DIET --}}
            <div>
                <label for="tujuan_diet" class="block text-sm font-medium text-[#f5f5dc] mb-1">
                    Tujuan Diet
                </label>
                <input
                    type="text"
                    id="tujuan_diet"
                    name="tujuan_diet"
                    value="{{ old('tujuan_diet', $user->tujuan_diet) }}"
                    class="w-full rounded-md bg-[#f5f5dc] p-2 focus:outline-none"
                    placeholder="Contoh: Turun BB, Bulking, Kesehatan"
                >
            </div>

        </div>

        <div class="pt-4">
            <button class="px-5 py-2 bg-[#A9B388] text-white rounded-md hover:bg-[#8d9a6c]">
                Simpan Perubahan
            </button>
        </div>

    </form>

</section>
