<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->integer('tinggi')->nullable();
            $table->integer('berat')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->enum('alergi_status', ['ya', 'tidak'])->nullable();
            $table->text('alergi_detail')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tanggal_lahir', 'jenis_kelamin', 'tinggi', 'berat',
                'riwayat_penyakit', 'alergi_status', 'alergi_detail'
            ]);
        });
    }
};
