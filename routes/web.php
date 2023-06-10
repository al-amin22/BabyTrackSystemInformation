<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KKController;
use App\Http\Controllers\AnggkkController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\VitaminController;
use App\Http\Controllers\TimbangController;
use App\Http\Controllers\PMTController;
use App\Http\Controllers\LacakController;
use App\Http\Controllers\PemulihanController;
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
    return view('welcome');
});

//route kk
Route::get('/kk', [KKController::class, 'index'])->name('kk.index');
Route::get('/kk/create', [KKController::class, 'create'])->name('kk.create');
Route::post('/kk', [KKController::class, 'store'])->name('kk.store');
Route::get('/kk/{kk}', [KKController::class, 'show'])->name('kk.show');
Route::get('/kk/{kk}/edit', [KKController::class, 'edit'])->name('kk.edit');
Route::put('/kk/{kk}', [KKController::class, 'update'])->name('kk.update');
Route::delete('/kk/{kk}', [KKController::class, 'destroy'])->name('kk.destroy');

// routes AnggKK
Route::get('/anggkk', [AnggkkController::class, 'index'])->name('anggkk.index');
Route::get('/anggkk/create', [AnggkkController::class, 'create'])->name('anggkk.create');
Route::post('/anggkk', [AnggkkController::class, 'store'])->name('anggkk.store');
Route::get('/anggkk/{anggkk}', [AnggkkController::class, 'show'])->name('anggkk.show');
Route::get('/anggkk/{anggkk}/edit', [AnggkkController::class, 'edit'])->name('anggkk.edit');
Route::put('/anggkk/{anggkk}', [AnggkkController::class, 'update'])->name('anggkk.update');
Route::delete('/anggkk/{anggkk}', [AnggkkController::class, 'destroy'])->name('anggkk.destroy');

//route Balita

Route::get('balita', [BalitaController::class, 'index'])->name('balita.index');
Route::get('balita/create', [BalitaController::class, 'create'])->name('balita.create');
Route::post('balita', [BalitaController::class, 'store'])->name('balita.store');
Route::get('balita/{id}/edit', [BalitaController::class, 'edit'])->name('balita.edit');
Route::put('balita/{id}', [BalitaController::class, 'update'])->name('balita.update');
Route::delete('balita/{id}', [BalitaController::class, 'destroy'])->name('balita.destroy');
Route::get('/balita/{idbalita}', [BalitaController::class, 'show'])->name('balita.show');
//route get anggota kk berdasarkan kk
Route::get('get-anggkks/{idkk}', [BalitaController::class, 'getAnggkks'])->name('balita.getanggkks');


//route vitamin
Route::get('/vitamin', [VitaminController::class, 'index'])->name('vitamin.index');
Route::get('/vitamin/create', [VitaminController::class, 'create'])->name('vitamin.create');
Route::post('/vitamin', [VitaminController::class, 'store'])->name('vitamin.store');
Route::get('/vitamin/{vitamin}', [VitaminController::class, 'show'])->name('vitamin.show');
Route::get('/vitamin/{id}/edit', [VitaminController::class, 'edit'])->name('vitamin.edit');
Route::put('/vitamin/{id}', [VitaminController::class, 'update'])->name('vitamin.update');
Route::delete('/vitamin/{vitamin}', [VitaminController::class, 'destroy'])->name('vitamin.destroy');
//rooute get balita berdasarkan anggota kk dan kepala keluarga
Route::get('/get-anggkk-by-kk/{kkId}', [VitaminController::class, 'getAnggkkByKk']);
Route::get('/get-balita-by-anggkk/{anggkkId}', [VitaminController::class, 'getBalitaByAnggkk']);

//route untuk timbang
Route::get('/timbang', [TimbangController::class, 'index'])->name('timbang.index');
Route::get('/timbang/create', [TimbangController::class, 'create'])->name('timbang.create');
Route::post('/timbang', [TimbangController::class, 'store'])->name('timbang.store');
Route::get('/get-anggkk-by-kk/{kkId}', [TimbangController::class, 'getAnggkkByKk']);
Route::get('/get-balita-by-anggkk/{anggkkId}', [TimbangController::class, 'getBalitaByAnggkk']);
Route::get('/get-timbang-by-balita/{balitaId}', [TimbangController::class, 'getTimbangByBalita']);
Route::post('/timbang', [TimbangController::class, 'store'])->name('timbang.store');
Route::get('/timbang/{id}', [TimbangController::class, 'show'])->name('timbang.show');
Route::delete('/timbang/{id}', [TimbangController::class, 'destroy'])->name('timbang.destroy');
Route::get('/timbang/{id}/edit', [TimbangController::class, 'edit'])->name('timbang.edit');
Route::put('/timbang/{id}', [TimbangController::class, 'update'])->name('timbang.update');

//route Pmt
Route::get('/pmt', [PMTController::class, 'index'])->name('pmt.index');
Route::get('/pmt/create', [PMTController::class, 'create'])->name('pmt.create');
Route::post('/pmt/store', [PMTController::class, 'store'])->name('pmt.store');
Route::get('/pmt/{id}', [PMTController::class, 'show'])->name('pmt.show');
Route::get('/pmt/{id}/edit', [PMTController::class, 'edit'])->name('pmt.edit');
Route::put('/pmt/{id}', [PMTController::class, 'update'])->name('pmt.update');
Route::delete('/pmt/{id}', [PMTController::class, 'destroy'])->name('pmt.destroy');
Route::get('/get-anggkk-by-kk/{kkId}', [PMTController::class, 'getAnggkkByKK']);
Route::get('/get-balita-by-anggkk/{anggkkId}', [PMTController::class, 'getBalitaByAnggkk']);
Route::get('/get-timbang-by-balita/{balitaId}', [PMTController::class, 'getTimbangByBalita']);
Route::get('/get-pmt-by-timbang/{timbangId}', [PMTController::class, 'getPmtByTimbang']);

//route lacak
Route::get('/lacak', [LacakController::class, 'index'])->name('lacak.index');
Route::get('/lacak/create', [LacakController::class, 'create'])->name('lacak.create');
Route::post('/lacak/store', [LacakController::class, 'store'])->name('lacak.store');
Route::get('/lacak/{lacak}', [LacakController::class, 'show'])->name('lacak.show');
Route::get('/lacak/{lacak}/edit', [LacakController::class, 'edit'])->name('lacak.edit');
Route::put('/lacak/{lacak}', [LacakController::class, 'update'])->name('lacak.update');
Route::delete('/lacak/{lacak}', [LacakController::class, 'destroy'])->name('lacak.destroy');
Route::get('/get-anggkk-by-kk/{kkId}', [LacakController::class, 'getAnggkkByKK']);
Route::get('/get-balita-by-anggkk/{anggkkId}', [LacakController::class, 'getBalitaByAnggkk']);
Route::get('/get-timbang-by-balita/{balitaId}', [LacakController::class, 'getTimbangByBalita']);
Route::get('/get-lacak-by-timbang/{timbangId}', [LacakController::class, 'getLacakByTimbang']);

//rpute Pemulihan
Route::get('/pemulihan', [PemulihanController::class, 'index'])->name('pemulihan.index');
Route::get('/pemulihan/create', [PemulihanController::class, 'create'])->name('pemulihan.create');
Route::post('/pemulihan/store', [PemulihanController::class, 'store'])->name('pemulihan.store');
Route::get('/pemulihan/{pemulihan}', [PemulihanController::class, 'show'])->name('pemulihan.show');
Route::get('/pemulihan/{pemulihan}/edit', [PemulihanController::class, 'edit'])->name('pemulihan.edit');
Route::put('/pemulihan/{pemulihan}', [PemulihanController::class, 'update'])->name('pemulihan.update');
Route::delete('/pemulihan/{pemulihan}', [PemulihanController::class, 'destroy'])->name('pemulihan.destroy');
Route::delete('/pemulihan/{pemulihan}', [PemulihanController::class, 'destroy'])->name('pemulihan.destroy');
Route::get('/get-anggkk-by-kk/{kkId}', [PemulihanController::class, 'getAnggkkByKK']);
Route::get('/get-balita-by-anggkk/{anggkkId}', [PemulihanController::class, 'getBalitaByAnggkk']);
Route::get('/get-timbang-by-balita/{balitaId}', [PemulihanController::class, 'getTimbangByBalita']);
Route::get('/get-lacak-by-timbang/{timbangId}', [PemulihanController::class, 'getLacakByTimbang']);

