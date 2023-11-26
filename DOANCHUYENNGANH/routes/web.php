<?php

use App\Http\Controllers\Phim\PhimController;
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
    return view('Phim.Home_Phim');
});
Route::get('/phongchieu', function () {
    return view('PhongChieu.Home_PhongChieu');
});
Route::get('/thucan', function () {
    return view('ThucAn.Home_ThucAn');
});
Route::get('/lichchieu', function () {
    return view('LichChieu.Home_LichChieu');
});
Route::get('/theloai', function () {
    return view('TheLoai.Home_TheLoai');
});
Route::get('/khachhang', function () {
    return view('KhachHang.Home_KhachHang');
});
Route::get('/dangnhap-dangki',function(){
    return view('TaiKhoan.DangKi_DangNhap');
});
Route::get('/te',function(){
    return view('Home.TrangChu');
});
Route::get('/trangchu',[PhimController::class,'trangchu']);