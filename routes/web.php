<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\HomeController;

/*
|-------------------------------------------------------------------------- 
| FRONTEND
|-------------------------------------------------------------------------- 
*/
/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/about', [FrontendController::class, 'about'])->name('about');

// ===== BERITA FRONTEND (FIX NAME) =====
Route::get('/berita', [FrontendController::class, 'berita'])
    ->name('berita.index');

Route::get('/berita/{id}', [FrontendController::class, 'beritaShow'])
    ->name('berita.show');


// ===== KEGIATAN FRONTEND =====
Route::get('/kegiatan', [FrontendController::class, 'kegiatan'])
    ->name('kegiatan.index');

Route::get('/kegiatan/{id}', [FrontendController::class, 'kegiatanShow'])
    ->name('kegiatan.show');


/*
|-------------------------------------------------------------------------- 
| AUTH / PROFILE (BREEZE)
|-------------------------------------------------------------------------- 
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|-------------------------------------------------------------------------- 
| ADMIN
|-------------------------------------------------------------------------- 
*/
Route::middleware(['auth', 'role.admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // DASHBOARD ADMIN
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD
        Route::resource('berita', BeritaController::class);
        Route::resource('kegiatan', KegiatanController::class);

        // 🔥 HAPUS FOTO KEGIATAN SATUAN
        Route::delete(
            '/kegiatan-gambar/{id}',
            [KegiatanController::class, 'destroyGambar']
        )->name('kegiatan.gambar.destroy');

    });


require __DIR__.'/auth.php';
