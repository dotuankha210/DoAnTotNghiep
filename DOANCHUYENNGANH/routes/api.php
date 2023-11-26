<?php

use App\Http\Controllers\KhachHang\KhachHangController;
use App\Http\Controllers\LichChieu\LichChieuController;
use App\Http\Controllers\Phim\PhimController;
use App\Http\Controllers\PhongChieu\PhongChieuController;
use App\Http\Controllers\TheLoai\TheLoaiController;
use App\Http\Controllers\ThucAn\ThucAnController;
use App\Models\LichChieu;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



// các route của phim
Route::get('/',[PhimController::class,'index']);
Route::get('/get_create_phim',[PhimController::class,'get_create'])->name('get_create_phim');
Route::post('/create_phim',[PhimController::class,'create'])->name('create_phim');
Route::get('/delete_phim/{id}',[PhimController::class,'delete'])->name('delete_phim');
Route::get('/get_update_phim/{id}',[PhimController::class,'get_update'])->name('get_update_phim');
Route::post('/update_phim',[PhimController::class,'update'])->name('update_phim');

// các route của phòng chiếu

Route::get('/phongchieu',[PhongChieuController::class,'index']);
Route::get('/delete_phongchieu/{id}',[PhongChieuController::class,'delete'])->name('delete_phongchieu');
Route::get('/get_create_phongchieu',[PhongChieuController::class,'get_create'])->name('get_create_phongchieu');
Route::post('/create_phongchieu',[PhongChieuController::class,'create'])->name('create_phongchieu');
Route::get('/get_update_phongchieu/{id}',[PhongChieuController::class,'get_update'])->name('get_update_phongchieu');
Route::post('/update_phongchieu',[PhongChieuController ::class,'update'])->name('update_phongchieu');

// các route của thức ăn

Route::get('/thucan',[ThucAnController::class,'index']);
Route::get('/get_create_thucan',[ThucAnController::class,'get_create'])->name('get_create_thucan');
Route::post('/create_thucan',[ThucAnController::class,'create'])->name('create_thucan');
Route::get('/delete_thucan/{id}',[ThucAnController::class,'delete'])->name('delete_thucan');
Route::get('/get_update_thucan/{id}',[ThucAnController::class,'get_update'])->name('get_update_thucan');
Route::post('/update_thucan',[ThucAnController ::class,'update'])->name('update_thucan');

// các route của lịch chiếu

Route::get('/lichchieu',[LichChieuController::class,'index']);
Route::get('/delete_lichchieu/{id}',[LichChieuController::class,'delete'])->name('delete_lichchieu');
Route::get('/get_update_lichchieu/{id}',[LichChieuController::class,'get_update'])->name('get_update_lichchieu');
Route::post('/update_lichchieu',[LichChieuController ::class,'update'])->name('update_lichchieu');
Route::get('/get_create_lichchieu',[LichChieuController::class,'get_create'])->name('get_create_lichchieu');
Route::post('/create_lichchieu',[LichChieuController::class,'tao'])->name('create_lichchieu');

// các route của thể loại

Route::get('/theloai',[TheLoaiController::class,'index']);
Route::get('/delete_theloai/{id}',[TheLoaiController::class,'delete'])->name('delete_theloai');
Route::post('/create_theloai',[TheLoaiController::class,'create'])->name('create_theloai');
Route::post('/update_theloai',[TheLoaiController ::class,'update'])->name('update_theloai');

//các route của khách hàng

Route::get('/khachhang',[KhachHangController::class,'index']);
Route::get('/delete_khachhang/{id}',[KhachHangController::class,'delete'])->name('delete_khachhang');
Route::post('/create_khachhang',[KhachHangController::class,'create'])->name('create_khachhang');
Route::post('/update_khachhang',[KhachHangController ::class,'update'])->name('update_khachhang');

/// các route của trang chủ
Route::get('/theloai-phim-theo-the-loai',[TheLoaiController::class,'trangchu'])->name('theloaitrangchu');