<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| PROFILE ROUTES (ASLI TIDAK DIUBAH, HANYA DIRAPIKAN)
|--------------------------------------------------------------------------
*/

// GROUP 1
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTE TAMBAHAN (TETAP)
Route::post('/profile/update-health', [ProfileController::class, 'updateDataKesehatan'])
    ->name('profile.update.health');

// GROUP 2
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::put('/profile/informasi-dasar', [ProfileController::class, 'updateInformasiDasar'])
        ->name('profile.update.informasi_dasar');

    Route::put('/profile/data-kesehatan', [ProfileController::class, 'updateDataKesehatan'])
        ->name('profile.update.data_kesehatan');

    Route::match(['put', 'patch'], '/profile/preferensi-nutrisi', [ProfileController::class, 'updatePreferensiNutrisi'])
    ->name('profile.preferensi-nutrisi');

    Route::delete('/profile/hapus-akun', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});Route::middleware('auth')->group(function () {

    Route::post('/profile/update/preferensi-nutrisi', 
        [ProfileController::class, 'updatePreferensiNutrisi']
    )->name('profile.update.preferensi_nutrisi');

});


// GROUP 3
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.show');
});

// SINGLE ROUTE (DIBIARKAN)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

// UPDATE FOTO
Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])
    ->name('profile.update.photo');


// HALAMAN LAIN (TIDAK DIUBAH)
Route::get('/upload-image', fn() => view('uploadimage'))->name('uploadimage');
Route::get('/riwayat', fn() => view('riwayat'))->name('riwayat');

require __DIR__.'/auth.php';

// PATCH TAMBAHAN (ADA DI FILE MU, TIDAK SAYA HAPUS)
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
