<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\profil;
use App\Models\User;
use App\Models\trainer;
use App\Models\training;
use App\Models\jadwal_latihan;
use App\Models\list_kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\jenis_trainer;
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
    return view('home.menu');
});
// route::get('/',[HomeController::class,'menu']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/profile',[profil::class,'profile']);
route::get('/edit_profile/{id}',[profil::class,'edit_profile']);
route::put('/update_profile/{id}',[profil::class,'update_profile']);
route::get('/konfigurasi',[profil::class,'konfigurasi_akun']);
route::POST('/tambah_merchandise',[AdminController::class,'tambah_merchandise']);
route::delete('/delete_merchandise/{id}',[AdminController::class,'hapus_merchandise']);
route::get('/edit_merchandise/{id}',[AdminController::class,'edit_merchandise']);
route::put('/update_merchandise/{id}',[AdminController::class,'update_merchandise']);


route::get('/daftar_latihan',[AdminController::class,'daftar_latihan']);
route::get('/jadwal_latihan',[AdminController::class,'jadwal_latihan']);
route::put('/ubah_latihan/{id}',[AdminController::class,'ubah_training']);
route::delete('/daftar_latihan/{id}',[AdminController::class,'hapus_training']);
route::POST('/daftar_latihan',[AdminController::class,'tambah_training']);
route::POST('/tambah_jadwal',[AdminController::class,'tambah_jadwal']);
route::POST('/tambah_trainer',[AdminController::class,'tambah_trainer']);
route::get('/daftar_latihan/{id}/edit',[AdminController::class,'edit_latihan']);
route::put('/update_latihan/{id}',[AdminController::class,'ubah_training']);

route::get('/redirect',[HomeController::class,'redirect']);
route::get('/data_pembayaran',[AdminController::class,'data_pembayaran']);
route::get('/data_member',[AdminController::class,'data_member']);
route::get('/list_pengajuan',[AdminController::class,'list_pengajuan']);

route::get('/daftar_trainer',[AdminController::class,'daftar_trainer']);
route::get('/edit_trainer/{id}',[AdminController::class,'edit_trainer']);
route::put('/update_trainer/{id}',[AdminController::class,'update_trainer']);
route::delete('/hapus_trainer/{id}',[AdminController::class,'hapus_trainer']);
route::get('/jadwal/{id}/edit',[AdminController::class,'edit_jadwal']);
route::put('/update_jadwal/{id}',[AdminController::class,'update_jadwal']);
route::put('/data_member/{id}',[AdminController::class,'update_member']);
route::delete('/data_member/{id}',[AdminController::class,'delete_member']);
route::get('/daftar_member/{id}',[AdminController::class,'daftar_member']);
route::get('/merchandise_admin',[AdminController::class,'merchandise_admin']);
route::get('/ajukan/{id}',[AdminController::class,'ajukan']);
route::get('/tolak/{id}',[AdminController::class,'tolak']);
route::put('/tambahmember_jadwal/{id}',[AdminController::class,'mbr']);
route::get('/lunas/{id}',[AdminController::class,'lunas']);

route::get('/list_training',[UserController::class,'list_training']);
route::get('/your_training',[UserController::class,'your_training']);
route::get('/userjadwal_training',[UserController::class,'userjadwal_training']);
route::get('/merchandise',[UserController::class,'merchandise']);
route::get('/status',[UserController::class,'status']);
route::get('/list_training',[UserController::class,'list_training']);
route::get('/lihat_jadwal/{id}',[UserController::class,'lihat_jadwal']);
route::get('/dashboard_user',[UserController::class,'dashboard_user']);

route::post('/add_cart/{id}',[UserController::class,'add_cart']);
route::get('/hapus_cart/{id}',[UserController::class,'hapus_cart']);
route::post('/order/{id}',[UserController::class,'order']);
// route::post('/order/{id}',[UserController::class,'payment']);
route::post('/midtrans-callback',[UserController::class,'callback']);
// route::get('/dashboard',[UserController::class,'dashboard']);

route::get('/dashboard_trainer',[TrainerController::class,'dashboard_trainer']);
route::get('/pengajuan',[TrainerController::class,'pengajuan']);
route::get('/list_member',[TrainerController::class,'list_member']);
route::get('/jadwal_training',[TrainerController::class,'jadwal_training']);
route::get('/list_mbr/{id_jadwal}',[TrainerController::class,'list_mbr']);
route::get('/gt_pengajuan/{id_jadwal}',[TrainerController::class,'gt_pengajuan']);
route::get('/prananda',[UserController::class,'prananda']);

route::put('/tambah_pengajuan/{id}',[TrainerController::class,'tambah_pengajuan']);

Route::get('/search', [AdminController::class, 'search'])->name('search');





