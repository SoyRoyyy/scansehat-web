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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // =====================
            // INFORMASI DASAR USER
            // =====================
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->integer('tinggi')->nullable();   // tinggi badan (cm)
            $table->integer('berat')->nullable();    // berat badan (kg)

            // =====================
            // DATA KESEHATAN
            // =====================
            $table->string('kondisi_kesehatan')->nullable();
            $table->string('alergi_makanan')->nullable();
            $table->string('alergi_detail')->nullable();
            $table->string('makanan_biasa')->nullable();
            $table->text('deskripsi_kesehatan')->nullable();

            // =====================
            // DATA NUTRISI (Final)
            // =====================
            $table->string('jenis_diet')->nullable();
            $table->string('tujuan_diet')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
