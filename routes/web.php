<?php

use App\Http\Controllers\AktaKelahiranController;
use App\Http\Controllers\AktaKematianController;
use App\Http\Controllers\AktaPernikahanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KIPController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\KTPController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SIUPController;
use App\Http\Controllers\IMBController;
use App\Http\Controllers\UserController;
use App\Models\AktaKelahiran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$controller_path = 'App\Http\Controllers';


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // ============== USER MANAGEMENT =================================
    Route::prefix('users')->group(function () {
        Route::get('/user-management', [UserController::class, 'index'])->name('user-management');
        Route::get('/add-user', [UserController::class, 'create'])->name('user-management.create');
        Route::post('/add-user', [UserController::class, 'store'])->name('user-management.store');

        Route::get('/{id}/edit-user', [UserController::class, 'edit'])->name('user-management.edit');
        Route::put('/{id}/edit-user', [UserController::class, 'update'])->name('user-management.update');
        Route::post('/edit-user', [UserController::class, 'destroy'])->name('user-management.destroy');

        Route::get('/change-password', [UserController::class, 'changepassword'])->name('user.changepassword');
        Route::post('/storechange-password', [UserController::class, 'storechangepassword'])->name('user.storechangepassword');


    });

    // =============== KTP =============================================
    Route::prefix('kependudukan')->group(function () {
        Route::get('/id-card/id-card-person', [KTPController::class, 'index'])->name('kependudukan-ktp.index');
        Route::get('/id-card/create-id-card', [KTPController::class, 'create'])->name('ktp.create');
        Route::post('/id-card/store-id-card', [KTPController::class, 'store'])->name('ktp.store');
        Route::get('/id-card/{id}/update-id-card', [KTPController::class, 'edit'])->name('ktp.edit');
        Route::PUT('/id-card/{id}/edit-id-card', [KTPController::class, 'update'])->name('ktp.update');
        Route::post('/id-card/create-id-card', [KTPController::class, 'destroy'])->name('ktp.destroy');

        Route::get('/id-card/{id}/view', [KTPController::class, 'view'])->name('ktp.view');
    });

    // =============== KK =============================================

    Route::prefix('kependudukan')->group(function () {        
        Route::get('/fams-list/family-card', [KKController::class,'index'])->name('kependudukan-kk.index');
        Route::get('/fams-list/create-kk', [KKController::class,'create'])->name('kk.create');
        Route::post('create-kk/store-kk', [KKController::class,'store'])->name('kk.store');
        Route::get('/fams-list/{id}/update-kk', [KKController::class,'edit'])->name('kk.edit');
        Route::PUT('/fams-list/{id}/update-kk', [KKController::class,'update'])->name('kk.update');
        Route::post('/fams-list/create-kk', [KKController::class,'destroy'])->name('kk.destroy');
        Route::get('/fams-list/{id}/view', [KKController::class, 'view'])->name('kk.view');

        Route::get('/fams-list/{id}/child', [KKController::class, 'child'])->name('kk.anak');
        Route::get('/fams-list/{id}/create', [KKController::class, 'createChild'])->name('kk.anak.create');
        Route::PUT('/fams-list/{id}/update-child', [KKController::class,'updateChild'])->name('kk.anak.update');
        Route::get('/fams-list/{id}/edit', [KKController::class, 'editChild'])->name('kk.anak.edit');
        Route::post('/fams-list/{id}/store', [KKController::class, 'storeChild'])->name('kk.anak.store');
        Route::post('/fams-list/destroyChild', [KKController::class, 'destroyChild'])->name('kk.anak.destroy');    
    });
   


    // =================== AKTA PERNIKAHAN =============================
    Route::prefix('/kependudukan/marriage-list/')->group(function () {
        Route::get('marriage-card', [AktaPernikahanController::class, 'index'])->name('pernikahan.index');
        Route::get('create-marriage-card', [AktaPernikahanController::class, 'create'])->name('pernikahan.create');
        Route::get('{id}/update-marriage-card', [AktaPernikahanController::class, 'edit'])->name('pernikahan.edit');
        Route::get('{id}/view-marriage-card', [AktaPernikahanController::class, 'view'])->name('pernikahan.view');
        Route::post('create-marriage-card/store', [AktaPernikahanController::class, 'store'])->name('pernikahan.store');
        Route::put('update-marriage-card/{id}/update', [AktaPernikahanController::class, 'update'])->name('pernikahan.update');
        Route::post('create-marriage-card/destroy', [AktaPernikahanController::class, 'destroy'])->name('pernikahan.destroy');
    });
    
    // ========================================= AKTA KELAHIRAN =====================================================

    Route::prefix('kependudukan/birth-list')->group(function () {
        Route::get('/birth-card', [AktaKelahiranController::class, 'index'])->name('aktakelahiran.index');
        Route::get('/create-birth-card', [AktaKelahiranController::class, 'create'])->name('aktakelahiran.create');
        Route::get('{id}/update-birth-card', [AktaKelahiranController::class, 'edit'])->name('aktakelahiran.edit');
        Route::get('{id}/view-birth-card', [AktaKelahiranController::class, 'view'])->name('aktakelahiran.view');

        Route::POST('/store', [AktaKelahiranController::class, 'store'])->name('aktakelahiran.store');
        Route::PUT('{id}/update', [AktaKelahiranController::class, 'update'])->name('aktakelahiran.update');
        Route::post('destroy', [AktaKelahiranController::class, 'destroy'])->name('aktakelahiran.destroy');

        Route::get('{id}/view-birth-card', [AktaKelahiranController::class, 'view'])->name('aktakelahiran.view');
    });

    // ========================================= AKTA KEMATIAN ======================================================
    Route::prefix('kependudukan/death-list')->group(function () {
        Route::get('/death-card', [AktaKematianController::class, 'index'])->name('aktakematian.index');
        Route::get('/create-death-card', [AktaKematianController::class, 'create'])->name('aktakematian.create');
        Route::get('{id}/update-death-card', [AktaKematianController::class, 'edit'])->name('aktakematian.edit');
        Route::post('/store', [AktaKematianController::class, 'store'])->name('aktakematian.store');
        Route::put('{id}/update', [AktaKematianController::class, 'update'])->name('aktakematian.update');
        Route::post('destroy', [AktaKematianController::class, 'destroy'])->name('aktakematian.destroy');

        Route::get('{id}/view-death-card', [AktaKematianController::class, 'view'])->name('aktakematian.view');
    });

    // ==================== INFORMASI ==================================
    Route::prefix('info')->group(function () {
        Route::get('/news', [InformasiController::class, 'index'])->name('informasi.index');
        Route::post('/news/store', [InformasiController::class, 'store'])->name('informasi.store');
        Route::post('/news/delete', [InformasiController::class, 'delete'])->name('informasi.destroy');
    });

    //  ===================================== PENGADUAN ============================================================
    Route::prefix('pengaduan/complaints')->group(function () {
        Route::get('/', [PengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::get('{id}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');

        Route::post('/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::post('{id}/update', [PengaduanController::class, 'update'])->name('pengaduan.update');
        Route::post('destroy', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');

        Route::get('{id}/view', [PengaduanController::class, 'view'])->name('pengaduan.view');
        
    });

    // ======================================= SIUP ==================================================================
    
    // Route::get('/pelayanan/siup/siup-card', $controller_path . '\layanan\siupController@index')->name('pelayanan-card-siup');
    Route::prefix('pelayanan/siup/siup-card')->group(function () {
        Route::get('/', [SIUPController::class,'index'])->name('siup.index');
        Route::get('/create', [SIUPController::class,'create'])->name('siup.create');
        Route::get('{id}/edit', [SIUPController::class,'edit'])->name('siup.edit');
        Route::get('{id}/view', [SIUPController::class, 'view'])->name('siup.view');

        Route::post('/store', [SIUPController::class,'store'])->name('siup.store');
        Route::put('{id}/update', [SIUPController::class,'update'])->name('siup.update');
        Route::post('destroy', [SIUPController::class,'destroy'])->name('siup.destroy');
    });  

    // ======================================= IMB ==================================================================
   
    Route::prefix('pelayanan/imb/imb-card')->group(function () {
        Route::get('/', [IMBController::class,'index'])->name('imb.index');
        Route::get('/create', [IMBController::class,'create'])->name('imb.create');
        Route::get('{id}/edit', [IMBController::class,'edit'])->name('imb.edit');
        Route::get('{id}/view', [IMBController::class, 'view'])->name('imb.view');
        Route::post('/store', [IMBController::class,'store'])->name('imb.store');
        Route::put('{id}/update', [IMBController::class,'update'])->name('imb.update');
        Route::post('destroy', [IMBController::class,'destroy'])->name('imb.destroy');
    });  

    // ======================================= KIP ==================================================================
    Route::prefix('pelayanan/kip/kip-card')->group(function () {
        Route::get('/', [KIPController::class, 'index'])->name('kip.index');
        Route::get('/create', [KIPController::class, 'create'])->name('kip.create');
        Route::get('{id}/edit', [KIPController::class, 'edit'])->name('kip.edit');
        Route::get('{id}/view', [KIPController::class, 'view'])->name('kip.view');

        Route::post('/store', [KIPController::class, 'store'])->name('kip.store');
        Route::put('{id}/update', [KIPController::class, 'update'])->name('kip.update');
        Route::post('destroy', [KIPController::class, 'destroy'])->name('kip.destroy');
    });


});
