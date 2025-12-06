<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Halaman profile utama (memuat 4 section)
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * SECTION 1 — Informasi Dasar
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // VALIDASI FIELD
        $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email',
            'lahir_hari'     => 'nullable|numeric',
            'lahir_bulan'    => 'nullable|numeric',
            'lahir_tahun'    => 'nullable|numeric',
            'jenis_kelamin'  => 'nullable|string',
            'tinggi'         => 'nullable|numeric',
            'berat'          => 'nullable|numeric',
            'riwayat_penyakit' => 'nullable|string',
            'alergi_status'    => 'nullable|string',
            'alergi_detail'    => 'nullable|string',
        ]);

        // FORMAT TANGGAL LAHIR → YYYY-MM-DD
        $tanggal_lahir = null;

        if ($request->lahir_hari && $request->lahir_bulan && $request->lahir_tahun) {
            $tanggal_lahir = sprintf(
                "%04d-%02d-%02d",
                $request->lahir_tahun,
                $request->lahir_bulan,
                $request->lahir_hari
            );
        }

        // UPDATE DATABASE
        $request->user()->update([
            'name'             => $request->name,
            'email'            => $request->email,
            'tanggal_lahir'    => $tanggal_lahir,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'tinggi'           => $request->tinggi,
            'berat'            => $request->berat,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'alergi_status'    => $request->alergi_status,
            'alergi_detail'    => $request->alergi_detail,
        ]);

        return Redirect::route('profile.edit')->with('status', 'informasi-dasar-updated');
    }


    /**
     * SECTION 2 — Data Kesehatan
     */
    public function updateDataKesehatan(Request $request): RedirectResponse
    {
        $request->validate([
            'kondisi_kesehatan'   => 'nullable|string',
            'alergi_makanan'      => 'required|string',
            'alergi_detail'       => 'nullable|string',
            'makanan_biasa'       => 'nullable|string',
            'deskripsi_kesehatan' => 'nullable|string',
        ]);

        $request->user()->update([
            'kondisi_kesehatan'   => $request->kondisi_kesehatan,
            'alergi_makanan'      => $request->alergi_makanan,
            'alergi_detail'       => $request->alergi_detail,
            'makanan_biasa'       => $request->makanan_biasa,
            'deskripsi_kesehatan' => $request->deskripsi_kesehatan,
        ]);

        return Redirect::route('profile.edit')->with('status', 'data-kesehatan-updated');
    }

    /**
     * SECTION 3 — Preferensi Nutrisi
     */
    public function updatePreferensiNutrisi(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_diet'        => 'nullable|string',
            'tujuan_diet'       => 'nullable|string',
        ]);

        $request->user()->update([
            'jenis_diet'         => $request->jenis_diet,
            'tujuan_diet'        => $request->tujuan_diet,
        ]);

        return Redirect::route('profile.edit')->with('status', 'preferensi-nutrisi-updated');
    }

    /**
     * SECTION 4 — Hapus Akun
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->profile_photo_path) {
            Storage::delete('public/' . $user->profile_photo_path);
        }

        // Simpan foto baru
        $path = $request->file('photo')->store('profile-photos', 'public');

        $user->profile_photo_path = $path;
        $user->save();

        return back()->with('status', 'Foto berhasil diperbarui.');
    }
}
