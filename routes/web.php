<?php

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\rw\LaporanController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\rt\PermintaanController;
use App\Http\Controllers\rw\ValidasiAkhirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/rt/register', [RegisterController::class, 'rt_index'])->name('rt.register');
Route::get('/rw/register', [RegisterController::class, 'rw_index'])->name('rw.register');
Route::post('/register', [RegisterController::class, 'create']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('permohonan', [PermohonanController::class, 'index'])->name('permohonan');
Route::get('permohonan/persy-perm-{need}', [PermohonanController::class, 'syarat'])->name('persyaratan');

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "img" => "newmainchar.png",
        "kata1" => "Bikin SP lebih Mudah dan Cepat",
        "kata2" => "Dengan APEM15",
        "kata3" => "Mari kita sukseskan program Kampung Inovasi",
        "kata4" => "Kampung Muara Bahari Berevolusi"
    ]);
})->name('home');

Route::prefix('/')->middleware(['auth', 'role:user|rt|rw'])->group(function () {
    Route::post('permohonan/perm-{form}', [PermohonanController::class, 'create']);
    Route::get('riwayat', [PermohonanController::class, 'riwayat'])->name('riwayat');
    Route::get('profil', [ProfilController::class, 'index'])->name('profil');
    Route::put('profil', [ProfilController::class, 'update'])->name('profil.update');
    Route::get('permohonan/perm-{form}', [PermohonanController::class, 'permohonan'])->name('form-perm');
});

Route::prefix('/rt')->middleware(['auth', 'role:rt'])->group(function () {
    Route::get('', [PermintaanController::class, 'index'])->name('rt.index');
    Route::get('profil', [ProfilController::class, 'rt_index'])->name('rt.profil');
    Route::put('profil', [ProfilController::class, 'rt_update'])->name('rt.profil.update');
    Route::get('permintaan/{permohonan:kode_permohonan}', [PermintaanController::class, 'permintaan'])->name('rt.permintaan');
    Route::get('permintaan/{permohonan:kode_permohonan}/pengantar', [PermintaanController::class, 'pengantar'])->name('rt.sp');
    Route::put('permintaan/{permohonan:kode_permohonan}/pengantar', [PermintaanController::class, 'uploadPengantar']);
});

Route::prefix('/rw')->middleware(['auth', 'role:rw'])->group(function () {
    Route::get('', [ValidasiAkhirController::class, 'index'])->name('rw.index');
    Route::get('profil', [ProfilController::class, 'rw_index'])->name('rw.profil');
    Route::put('profil', [ProfilController::class, 'rw_update'])->name('rw.profil.update');
    Route::get('permintaan', [ValidasiAkhirController::class, 'permintaan'])->name('rw.permintaan');
    Route::get('permintaan/{permohonan:kode_permohonan}', [ValidasiAkhirController::class, 'persetujuan'])->name('rw.persetujuan');
    Route::get('permintaan/{permohonan:kode_permohonan}/persetujuan', [ValidasiAkhirController::class, 'permohonan'])->name('rw.sp');
    Route::put('permintaan/{permohonan:kode_permohonan}/persetujuan', [ValidasiAkhirController::class, 'uploadPermohonan']);
    Route::get('laporan', [LaporanController::class, 'index'])->name('rw.laporan');
    Route::get('laporan/download', [LaporanController::class, 'download'])->name('rw.laporan.download');
});






Route::middleware(['role:user|rt|rw'])->get('download', function (Request $request) {
    $filePath = $request->link;

    # split filename with slash
    $fileName = explode('/', $filePath);

    if (in_array($fileName[1], ['suratpermohonan', 'fileakta', 'fileaktaanggota', 'filedraftkk', 'filekjp', 'filekk', 'filektpibu', 'filektpkepalart', 'filesktm'])) {
        if (auth()->user()->hasRole(['user']) && auth()->user()->id != $fileName[0]) {
            return abort(404);
        }
    } else if (in_array($fileName[1], ['sk'])) {
        if (auth()->user()->hasRole(['user'])) {
            return abort(404);
        }
    }

    if (!Storage::disk('local')->exists($filePath)) {
        abort('404');
    }
    return response()->download(storage_path('app' . DIRECTORY_SEPARATOR . ($filePath)), Str::of($filePath)->basename(), [], 'inline');
})->name('download');

Route::get('/tatacara', function () {
    return view('tatacara', [
        "title" => "Tata Cara" ,
        "img" => "tatacara.png"
    ]);
})->name('tatacara');