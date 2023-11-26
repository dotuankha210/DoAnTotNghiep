<?php

namespace App\Http\Controllers\PhongChieu;

use App\Http\Controllers\Controller;
use App\Models\LoaiManHinh;
use App\Models\PhongChieu;
use App\Models\TinhTrang;
use Illuminate\Http\Request;
use Exception;
class PhongChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PhongChieu::all());
    }
    public function get_create(){
        $loaimanhinh=LoaiManHinh::all();
        $tinhtrang=TinhTrang::all();
        return view('PhongChieu.PhongChieu_create',['loaimanhinh'=>$loaimanhinh,'tinhtrang'=>$tinhtrang]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'TenPhong'=>'required',
         
            'SoHangGhe'=>'required',
            'SoGheMotHang'=>'required',
        ],
            ['TenPhong.required'=>'Tên Phòng Không Được Để Trống',
      
            'SoHangGhe.required'=>'Số Hàng Ghế Không Được Để Trống',
            'SoGheMotHang.required'=>' Số Ghế Một Hàng Không Được Để Trống',
        ]);
        try {
            $phim = new PhongChieu();
            $phim->TenPhong=$request->TenPhong;
            $phim->idManHinh=$request->idMH;
            $phim->SoChoNgoi=$request->SoGheMotHang*$request->SoHangGhe;
            $phim->idTinhTrang=$request->idTinhTrangPhongChieu;
            $phim->SoHangGhe=$request->SoHangGhe;
            $phim->SoGheMotHang=$request->SoGheMotHang;
            $phim->save();
            return response()->json(['message' => 'Thêm Phòng Chiếu thành công']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function get_update($id)
    {
        try{
            $loaimanhinh=LoaiManHinh::all();
            $Phong=PhongChieu::where('idPhongChieu',$id)->get();
            $tinhtrang=TinhTrang::all();
            return view('PhongChieu.PhongChieu_update',['Phong'=>$Phong,'tinhtrang'=>$tinhtrang,'loaimanhinh'=>$loaimanhinh]);
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
    public function update(Request $request)
    {
        try{
            
            $phim = PhongChieu::where('idPhongChieu', $request->idPhongChieu)->first();
            $phim->TenPhong=$request->TenPhong;
            $phim->idManHinh=$request->idManHinh;
            $phim->SoChoNgoi=$request->SoGheMotHang*$request->SoHangGhe;
            $phim->idTinhTrang=$request->idTinhTrang;
            $phim->SoHangGhe=$request->SoHangGhe;
            $phim->SoGheMotHang=$request->SoGheMotHang;
            $phim->save();
            return response()->json(['message' => 'sửa phòng chiếu thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            PhongChieu::where('idPhongChieu', $id)->delete();
            return response()->json(['message' => 'xóa phòng chiếu thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        try{
            PhongChieu::where('idPhongChieu', $id)->delete();
            return response()->json(['message' => 'xóa phòng chiếu thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
