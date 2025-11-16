<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tanggal_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'in:Laki-laki,Perempuan'],
            'tinggi' => ['nullable', 'integer', 'min:0'],
            'berat' => ['nullable', 'integer', 'min:0'],
            'riwayat_penyakit' => ['nullable', 'string'],
            'alergi_status' => ['nullable', 'in:ya,tidak'],
            'alergi_detail' => ['nullable', 'string'],
            'terms' => ['accepted'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'alergi_status' => $request->alergi_status,
            'alergi_detail' => $request->alergi_status === 'ya' ? $request->alergi_detail : null,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
