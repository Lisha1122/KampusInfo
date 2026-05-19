<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

/*
|--------------------------------------------------------------------------
| LOGIN CUSTOM
|--------------------------------------------------------------------------
| Menggunakan halaman login milik sendiri:
| resources/js/Pages/Tampilan/Login.vue
|
*/

Route::get('/login', function () {
    return Inertia::render('Tampilan/Login');
})->name('login');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return Inertia::render('Tampilan/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| BERITA
|--------------------------------------------------------------------------
*/

Route::get('/berita', function () {
    return Inertia::render('Tampilan/Berita');
})->middleware(['auth', 'verified'])->name('berita');

/*
|--------------------------------------------------------------------------
| NOTIFICATION
|--------------------------------------------------------------------------
*/

Route::get('/notification', function () {
    return Inertia::render('Tampilan/Notification');
})->middleware(['auth', 'verified'])->name('notification');

/*
|--------------------------------------------------------------------------
| DETAIL INFORMASI
|--------------------------------------------------------------------------
*/

Route::get('/detail-informasi/{id}', function ($id) {
    return Inertia::render('Tampilan/DetailInformasi', [
        'id' => $id
    ]);
})->name('detail-informasi.show');

/*
|--------------------------------------------------------------------------
| DETAIL BERITA (BARU)
|--------------------------------------------------------------------------
*/

Route::get('/berita/{id}', function ($id) {
    return Inertia::render('Tampilan/DetailBerita', [
        'id' => $id
    ]);
})->middleware(['auth', 'verified'])->name('berita.detail');
/*
|--------------------------------------------------------------------------
| TERSIMPAN
|--------------------------------------------------------------------------
*/

Route::get('/tersimpan', function () {
    return Inertia::render('Tampilan/Tersimpan');
})->middleware(['auth', 'verified'])->name('tersimpan');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', function () {
    return Inertia::render('Tampilan/Admin/DashboardAdmin');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// AUTH ROUTES
require __DIR__.'/auth.php';