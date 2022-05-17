<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main_view/index');
})->name('landing_page');

Route::get('/activate_email', function () {
    return view('main_view/detail_muqayyadah');
});
// Authentication Routes...
Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
// lupa password route
Route::get('/lupa_password', [App\Http\Controllers\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.email');
Route::post('/lupa_password', [App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail']);
// Password reset routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])->name('password.request');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class,'reset'])->name('password.reset');
// login route
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class,'register']);
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('login_user');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::middleware('auth')->group(function(){
    Route::middleware('IsUser')->group(function(){
        Route::get('/mutlaqah', [App\Http\Controllers\User\PageController::class,'mutlaqah']);
        Route::get('/muqayyadah', [App\Http\Controllers\User\PageController::class,'muqayyadah']);
        Route::get('/mutlaqah/pengajuan/emas', [App\Http\Controllers\User\PageController::class,'form_pengajuan_emas_mt']);
        Route::post('/mutlaqah/pengajuan/emas', [App\Http\Controllers\User\PengajuanController::class,'emas_store']);
        Route::get('/mutlaqah/pengajuan/rupiah', [App\Http\Controllers\User\PageController::class,'form_pengajuan_rupiah_mt']);
        Route::post('/mutlaqah/pengajuan/rupiah', [App\Http\Controllers\User\PengajuanController::class,'rupiah_store']);
        Route::get('/api/versi/bulan/{id}', [App\Http\Controllers\User\PageController::class,'cari_bulan']);
        Route::get('/api/versi/nisbah/{id}', [App\Http\Controllers\User\PageController::class,'cari_nisbah']);
        Route::get('/mutlaqah/usaha/{id}', [App\Http\Controllers\User\PageController::class,'detail_usaha_mutlaqah']);
        Route::get('/muqayyadah/usaha/{id}', [App\Http\Controllers\User\PageController::class,'detail_usaha_muqayyadah']);
        Route::get('/detail_mutlaqah', function () {
            return view('main_view/detail_mutlaqah');
        });
        Route::get('/detail_muqayyadah', function () {
            return view('main_view/detail_muqayyadah');
        });
        Route::group(['prefix'=>'user'], function () {
            Route::get('/kelengkapan_data', function () {
                return view('user_view/form_kelengkapan_data_anggota');
            });
        });
    });
    Route::middleware('IsAdmin')->group(function(){
        Route::group(['prefix'=>'admin'],function(){
            Route::get('/dashboard',function () {
                return view('admin_view/dashboard');
            })->name('admin_dashboard');
            Route::group(['prefix'=>'users_dashboard'], function(){
                Route::get('/ganti_sandi',[App\Http\Controllers\Admin\UsersDashboardController::class,'ganti_sandi_page'])->name('ganti_sandi_page');
                Route::post('/ganti_sandi',[App\Http\Controllers\Admin\UsersDashboardController::class,'ganti_sandi'])->name('ganti_sandi');
                Route::get('/pengaturan_akun',[App\Http\Controllers\Admin\UsersDashboardController::class,'pengaturan_akun_page']);
                Route::get('/pengaturan_akun/{id}/edit',[App\Http\Controllers\Admin\UsersDashboardController::class,'pengaturan_akun_edit']);
                Route::put('/pengaturan_akun/{id}/edit',[App\Http\Controllers\Admin\UsersDashboardController::class,'pengaturan_akun_update']);
                Route::post('/pengaturan_akun',[App\Http\Controllers\Admin\UsersDashboardController::class,'pengaturan_akun']);
            });
            Route::group(['prefix'=>'users_anggota'], function(){
                Route::get('/data_verifikasi_akun',[App\Http\Controllers\Admin\UsersAnggotaController::class,'data_verifikasi_akun_page']);
                Route::get('/data_verifikasi_akun/{id}/edit',[App\Http\Controllers\Admin\UsersAnggotaController::class,'data_verifikasi_akun_edit']);
                Route::put('/data_verifikasi_akun/{id}/edit',[App\Http\Controllers\Admin\UsersAnggotaController::class,'data_verifikasi_akun_update']);
                Route::post('/data_verifikasi_akun/import',[App\Http\Controllers\Admin\UsersAnggotaController::class,'data_verifikasi_akun_import']);
                Route::post('/data_verifikasi_akun',[App\Http\Controllers\Admin\UsersAnggotaController::class,'data_verifikasi_akun_add']);
                Route::get('/pengaturan_akun',[App\Http\Controllers\Admin\UsersAnggotaController::class,'pengaturan_akun_page']);
                Route::get('/pengaturan_akun/cari/{id}',[App\Http\Controllers\Admin\UsersAnggotaController::class,'pengaturan_akun_cari']);
                Route::get('/pengaturan_akun/{id}/edit',[App\Http\Controllers\Admin\UsersAnggotaController::class,'pengaturan_akun_edit']);
                Route::put('/pengaturan_akun/{id}/edit',[App\Http\Controllers\Admin\UsersAnggotaController::class,'pengaturan_akun_update']);
                Route::get('/pengaturan_akun/{id}/view',[App\Http\Controllers\Admin\UsersAnggotaController::class,'pengaturan_akun_edit']);
                Route::post('/pengaturan_akun',[App\Http\Controllers\Admin\UsersAnggotaController::class,'pengaturan_akun_add']);
                Route::get('/akses_area_anggota',[App\Http\Controllers\Admin\UsersAnggotaController::class,'akses_area_anggota_page']);
    
            });
            Route::group(['prefix'=>'master'], function(){
                // perwada
                Route::get('/perwada',[App\Http\Controllers\Admin\MasterController::class,'perwada_page']);
                Route::get('/perwada/{id}/edit',[App\Http\Controllers\Admin\MasterController::class,'perwada_edit']);
                Route::put('/perwada/{id}/edit',[App\Http\Controllers\Admin\MasterController::class,'perwada_update']);
                Route::post('/perwada',[App\Http\Controllers\Admin\MasterController::class,'perwada_add']);
                // cif anggota
                Route::get('/cif_anggota',[App\Http\Controllers\Admin\MasterController::class,'cif_anggota_page']);
                Route::post('/cif_anggota/import',[App\Http\Controllers\Admin\MasterController::class,'cif_anggota_import']);
                Route::get('/cif_anggota/{id}/edit',[App\Http\Controllers\Admin\MasterController::class,'cif_anggota_edit']);
                Route::post('/cif_anggota/{id}/edit',[App\Http\Controllers\Admin\MasterController::class,'cif_anggota_update']);
                Route::post('/cif_anggota',[App\Http\Controllers\Admin\MasterController::class,'cif_anggota_add']);
                Route::get('/cif_anggota/cari/{id}',[App\Http\Controllers\Admin\MasterController::class,'cif_anggota_cari']);
                // versi
                Route::get('/versi/muqoyyadah_emas',[App\Http\Controllers\Admin\MasterVersiController::class,'muqayyadah_emas_index']);
                Route::post('/versi/muqoyyadah_emas',[App\Http\Controllers\Admin\MasterVersiController::class,'store']);
                Route::get('/versi/muqoyyadah_rupiah',[App\Http\Controllers\Admin\MasterVersiController::class,'muqayyadah_rupiah_index']);
                Route::post('/versi/muqoyyadah_rupiah',[App\Http\Controllers\Admin\MasterVersiController::class,'store']);
                Route::get('/versi/mutlaqah_emas',[App\Http\Controllers\Admin\MasterVersiController::class,'mutlaqah_emas_index']);
                Route::post('/versi/mutlaqah_emas',[App\Http\Controllers\Admin\MasterVersiController::class,'store']);
                Route::get('/versi/mutlaqah_rupiah',[App\Http\Controllers\Admin\MasterVersiController::class,'mutlaqah_rupiah_index']);
                Route::post('/versi/mutlaqah_rupiah',[App\Http\Controllers\Admin\MasterVersiController::class,'store']);
                // konten wa
                Route::get('/konten_wa',[App\Http\Controllers\Admin\MasterController::class,'konten_wa_page']);
                // list keterangan
                Route::get('/list_keterangan',[App\Http\Controllers\Admin\MasterController::class,'list_keterangan_page']);
                // item emas
                Route::get('/item_emas',[App\Http\Controllers\Admin\MasterController::class,'item_emas_page']);
                Route::get('/item_emas/{id}/edit',[App\Http\Controllers\Admin\MasterController::class,'item_emas_edit']);
                Route::put('/item_emas/{id}/edit',[App\Http\Controllers\Admin\MasterController::class,'item_emas_update']);
                Route::post('/item_emas',[App\Http\Controllers\Admin\MasterController::class,'item_emas_add']);
            });
            Route::group(['prefix'=>'daftar_usaha'], function(){
                Route::get('/usaha_basis_emas',[App\Http\Controllers\Admin\DaftarUsahaController::class,'usaha_basis_emas_page'])->name('admin.usaha_basis_emas');
                Route::get('/usaha_basis_rupiah',[App\Http\Controllers\Admin\DaftarUsahaController::class,'usaha_basis_rupiah_page'])->name('admin.usaha_basis_rupiah');
                Route::get('/usaha_basis_emas/create',[App\Http\Controllers\Admin\DaftarUsahaController::class,'create_usaha_basis_emas_page']);
                Route::post('/usaha_basis_emas/create',[App\Http\Controllers\Admin\DaftarUsahaController::class,'create_usaha_basis_emas']);
                Route::get('/usaha_basis_emas/{id}/edit',[App\Http\Controllers\Admin\DaftarUsahaController::class,'edit_usaha_basis_emas_page']);
                Route::put('/usaha_basis_emas/{id}/edit',[App\Http\Controllers\Admin\DaftarUsahaController::class,'update_usaha_basis_emas']);
                Route::get('/usaha_basis_rupiah/create',[App\Http\Controllers\Admin\DaftarUsahaController::class,'create_usaha_basis_rupiah_page']);
                Route::post('/usaha_basis_rupiah/create',[App\Http\Controllers\Admin\DaftarUsahaController::class,'create_usaha_basis_rupiah']);
                Route::get('/usaha_basis_rupiah/{id}/edit',[App\Http\Controllers\Admin\DaftarUsahaController::class,'edit_usaha_basis_rupiah_page']);
                Route::put('/usaha_basis_rupiah/{id}/edit',[App\Http\Controllers\Admin\DaftarUsahaController::class,'update_usaha_basis_rupiah']);
                Route::get('/laporan',[App\Http\Controllers\Admin\DaftarUsahaController::class,'laporan_page']);
            });
            Route::group(['prefix'=>'pengajuan_dsyirkah'], function(){
                // emas
                Route::get('/emas',[App\Http\Controllers\Admin\PengajuanController::class,'emas_index']);
                Route::get('/emas/approval/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'emas_approval']);
                Route::post('/emas/approval/{id}/approve',[App\Http\Controllers\Admin\PengajuanController::class,'emas_approval_store']);
                Route::post('/emas/approval/{id}/reject',[App\Http\Controllers\Admin\PengajuanController::class,'reject_pengajuan_emas']);
                Route::get('/emas/detail/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'emas_detail']);
                Route::get('/emas/edit/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'emas_edit']);
                Route::get('/emas/reject',[App\Http\Controllers\Admin\PengajuanController::class,'emas_reject']);
                Route::get('/emas/reject/restore/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'restore_pengajuan_emas']);
                // rupiah
                Route::get('/rupiah',[App\Http\Controllers\Admin\PengajuanController::class,'rupiah_index']);
                Route::get('/rupiah/approval/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'rupiah_approval']);
                Route::post('/rupiah/approval/{id}/approve',[App\Http\Controllers\Admin\PengajuanController::class,'rupiah_approval_store']);
                Route::post('/rupiah/approval/{id}/reject',[App\Http\Controllers\Admin\PengajuanController::class,'reject_pengajuan_rupiah']);
                Route::get('/rupiah/detail/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'rupiah_detail']);
                Route::get('/rupiah/edit/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'rupiah_edit']);
                Route::get('/rupiah/reject',[App\Http\Controllers\Admin\PengajuanController::class,'rupiah_reject']);
                Route::get('/rupiah/reject/restore/{id}',[App\Http\Controllers\Admin\PengajuanController::class,'restore_pengajuan_rupiah']);
            });
            Route::group(['prefix'=>'dsyirkah_aktif'], function(){
                // emas
                Route::get('/emas',[App\Http\Controllers\Admin\DsyirkahAktifController::class,'emas_index']);
                Route::get('/emas/action',[App\Http\Controllers\Admin\DsyirkahAktifController::class,'emas_approval']);
                Route::get('/emas/detail',[App\Http\Controllers\Admin\DsyirkahAktifController::class,'emas_detail']);
                // rupiah
                Route::get('/rupiah',[App\Http\Controllers\Admin\DsyirkahAktifController::class,'rupiah_index']);
                Route::get('/rupiah/action',[App\Http\Controllers\Admin\DsyirkahAktifController::class,'rupiah_approval']);
                Route::get('/rupiah/detail',[App\Http\Controllers\Admin\DsyirkahAktifController::class,'rupiah_detail']);
            });
            Route::group(['prefix'=>'reakad_dsyirkah'], function(){
    
            });
            Route::group(['prefix'=>'dsyirkah_nonaktif'], function(){
                // emas
                Route::get('/emas',[App\Http\Controllers\Admin\DsyirkahNonAktifController::class,'emas_index']);
                Route::get('/emas/action',[App\Http\Controllers\Admin\DsyirkahNonAktifController::class,'emas_approval']);
                Route::get('/emas/detail',[App\Http\Controllers\Admin\DsyirkahNonAktifController::class,'emas_detail']);
                // rupiah
                Route::get('/rupiah',[App\Http\Controllers\Admin\DsyirkahNonAktifController::class,'rupiah_index']);
                Route::get('/rupiah/action',[App\Http\Controllers\Admin\DsyirkahNonAktifController::class,'rupiah_approval']);
                Route::get('/rupiah/detail',[App\Http\Controllers\Admin\DsyirkahNonAktifController::class,'rupiah_detail']);
            });
        });
    });
});

