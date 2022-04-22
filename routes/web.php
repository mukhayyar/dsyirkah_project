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
});
Route::get('/mutlaqah', function () {
    return view('main_view/mutlaqah');
});
Route::get('/muqayyadah', function () {
    return view('main_view/muqayyadah');
});
Route::get('/detail_mutlaqah', function () {
    return view('main_view/detail_mutlaqah');
});
Route::get('/detail_muqayyadah', function () {
    return view('main_view/detail_muqayyadah');
});

Route::get('/activate_email', function () {
    return view('main_view/detail_muqayyadah');
});

Route::group(['prefix'=>'user'], function () {
    Route::get('/pengajuan/emas', function () {
        return view('user_view/form_pengajuan_emas');
    });
    Route::get('/pengajuan/rupiah', function () {
        return view('user_view/form_pengajuan_rupiah');
    });
    Route::get('/kelengkapan_data', function () {
        return view('user_view/form_kelengkapan_data_anggota');
    });
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard',function () {
        return view('admin_view/dashboard');
    });
    Route::group(['prefix'=>'users_dashboard'], function(){
        Route::get('/ganti_sandi',[App\Http\Controllers\Admin\UsersDashboardController::class,'ganti_sandi_page']);
        Route::post('/ganti_sandi',[App\Http\Controllers\Admin\UsersDashboardController::class,'ganti_sandi']);
        Route::get('/pengaturan_akun',[App\Http\Controllers\Admin\UsersDashboardController::class,'pengaturan_akun_page']);
        Route::post('/pengaturan_akun',[App\Http\Controllers\Admin\UsersDashboardController::class,'pengaturan_akun']);
    });
    Route::group(['prefix'=>'users_anggota'], function(){
        Route::get('/data_verifikasi_akun',[App\Http\Controllers\Admin\UsersAnggotaController::class,'data_verifikasi_akun_page']);
        Route::get('/pengaturan_akun',[App\Http\Controllers\Admin\UsersAnggotaController::class,'pengaturan_akun_page']);
        Route::get('/akses_area_anggota',[App\Http\Controllers\Admin\UsersAnggotaController::class,'akses_area_anggota_page']);

    });
    Route::group(['prefix'=>'master'], function(){
        Route::get('/perwada',[App\Http\Controllers\Admin\MasterController::class,'perwada_page']);
        Route::get('/cif_anggota',[App\Http\Controllers\Admin\MasterController::class,'cif_anggota_page']);
        Route::get('/konten_wa',[App\Http\Controllers\Admin\MasterController::class,'konten_wa_page']);
        Route::get('/list_keterangan',[App\Http\Controllers\Admin\MasterController::class,'list_keterangan_page']);
        Route::get('/item_emas',[App\Http\Controllers\Admin\MasterController::class,'item_emas_page']);
    });
    Route::group(['prefix'=>'daftar_usaha'], function(){
        Route::get('/usaha_basis_emas',[App\Http\Controllers\Admin\DaftarUsahaController::class,'usaha_basis_emas_page']);
        Route::get('/usaha_basis_rupiah',[App\Http\Controllers\Admin\DaftarUsahaController::class,'usaha_basis_rupiah_page']);
        Route::get('/create_usaha_basis_emas',[App\Http\Controllers\Admin\DaftarUsahaController::class,'create_usaha_basis_emas_page']);
        Route::get('/create_usaha_basis_rupiah',[App\Http\Controllers\Admin\DaftarUsahaController::class,'create_usaha_basis_rupiah_page']);
        Route::get('/laporan',[App\Http\Controllers\Admin\DaftarUsahaController::class,'laporan_page']);
    });
    Route::group(['prefix'=>'pengajuan_dsyirkah'], function(){

    });
    Route::group(['prefix'=>'dsyirkah_aktif'], function(){

    });
    Route::group(['prefix'=>'reakad_dsyirkah'], function(){

    });
    Route::group(['prefix'=>'dsyirkah_nonaktif'], function(){

    });
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});
