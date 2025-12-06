<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        // ======================
        // INFORMASI DASAR
        // ======================
        'tanggal_lahir',
        'jenis_kelamin',
        'tinggi',
        'berat',

        // ======================
        // DATA KESEHATAN
        // ======================
        'kondisi_kesehatan',
        'alergi_makanan',
        'alergi_detail',
        'makanan_biasa',
        'deskripsi_kesehatan',

        // ======================
        // PREFERENSI NUTRISI
        // ======================
        'jenis_diet',
        'tujuan_diet',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
