<?php

namespace App\Http\Controllers\LichChieu;

use App\Http\Controllers\Controller;
use App\Models\DinhDangPhim;
use App\Models\LichChieu;
use App\Models\PhongChieu;
use App\Models\Ve;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
class LichChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(LichChieu::all());
    }
    public function get_update($id)
    {
        try{
            $dinhdangphim=DinhDangPhim::all();
            $phongchieu=PhongChieu::all();
            $lichchieu=LichChieu::where('idLichChieu',$id)->get();
            return view('LichChieu.LichChieu_update',['phongchieu'=>$phongchieu,'dinhdangphim'=>$dinhdangphim,'lichchieu'=>$lichchieu]);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_create(){
        $phong=PhongChieu::all();
        $dinhdang=DinhDangPhim::all();
        return view('LichChieu.LichChieu_create',['phong'=>$phong,'dinhdang'=>$dinhdang]);
    }
    public function tao(Request $request)
    {
     
        try {
            // Kiểm tra tồn tại của phòng chiếu
            $phongchieu = PhongChieu::where('idPhongChieu', $request->idPhongChieu)->first();
            if (!$phongchieu) {
                return response()->json(['message' => 'Phòng chiếu không tồn tại'], 404);
            }
    
            // Sử dụng transaction để đảm bảo tính nhất quán
           
                $phim = new LichChieu();
                $phim->ThoiGianChieu = $request->ThoiGianChieu;
                $phim->GiaVe = $request->GiaVe;
                $phim->TrangThai = $request->TrangThai;
                $phim->idPhong = $request->idPhongChieu;
                $phim->idDinhDang = $request->idDinhDangPhim;
                $phim->save();
    
                for ($i = 1; $i <= $phongchieu->SoChoNgoi; $i++) {
                    $ve = new Ve();
                    $ve->LoaiVe = 2;
                    $ve->idLichChieu = $phim->idLichChieu;
                    $ve->MaGheNgoi = $i;
                    $ve->TienBanVe = $phim->GiaVe;
                    $ve->save();
                }
    
             
    
                return response()->json(['message' => 'Thêm lịch chiếu thành công','phongchieu'=>$phongchieu->SoChoNgoi]);
        
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    
    
    public function update(Request $request)
    {
       
        try{
            
            $phim = LichChieu::where('idLichChieu', $request->idLichChieu)->first();
            $phim->ThoiGianChieu=$request->ThoiGianChieu;
            $phim->GiaVe=$request->GiaVe;
            $phim->TrangThai=$request->TrangThai;
            $phim->idPhong=$request->idPhong;
            $phim->idDinhDang=$request->idDinhDang;
            $phim->save();
            return response()->json(['message' => 'sửa lịch chiếu thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        try{
            LichChieu::where('idLichChieu', $id)->delete();
            return response()->json(['message' => 'xóa lịch chiếu thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
