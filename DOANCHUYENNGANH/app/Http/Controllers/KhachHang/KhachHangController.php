<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(KhachHang::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'HoTen'=>'required',
            'NgaySinh'=>'required',
            'DiaChi'=>'required',
            'SDT'=>'required',
            'CMND'=>'required',
            'DiemTichLuy'=>'required',
        ],
            ['HoTen.required'=>'Tên Không Được Để Trống',
            'NgaySinh.required'=>'Ngày Sinh Không Được Để Trống',
            'DiaChi.required'=>'Địa Chỉ Không Được Để Trống',
            'SDT.required'=>'Số Điện Thoại Không Được Để Trống',
            'CMND.required'=>'Chứng Minh Nhân Dân Không Được Để Trống',
            'DiemTichLuy.required'=>'Điểm Tích Lũy Không Được Để Trống',
        ]);
        try {
            $phim = new KhachHang();
            $phim->HoTen=$request->HoTen;
            $phim->NgaySinh=$request->NgaySinh;
            $phim->DiaChi=$request->DiaChi;
            $phim->SDT=$request->SDT;
            $phim->CMND=$request->CMND;
            $phim->DiemTichLuy=$request->DiemTichLuy;
            $phim->save();
            return response()->json(['message' => 'success','phim'=>$phim]);
        } catch (Exception $e) {
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
    
        $request->validate([
            'HoTen'=>'required',
            'NgaySinh'=>'required',
            'DiaChi'=>'required',
            'SDT'=>'required',
            'CMND'=>'required',
            'DiemTichLuy'=>'required',
        ],
            ['HoTen.required'=>'Tên Không Được Để Trống',
            'NgaySinh.required'=>'Ngày Sinh Không Được Để Trống',
            'DiaChi.required'=>'Địa Chỉ Không Được Để Trống',
            'SDT.required'=>'Số Điện Thoại Không Được Để Trống',
            'CMND.required'=>'Chứng Minh Nhân Dân Không Được Để Trống',
            'DiemTichLuy.required'=>'Điểm Tích Lũy Không Được Để Trống',
        ]);
        try {
            $phim =KhachHang::where('idKH', $request->idKH)->first();;
            $phim->HoTen=$request->HoTen;
            $phim->NgaySinh=$request->NgaySinh;
            $phim->DiaChi=$request->DiaChi;
            $phim->SDT=$request->SDT;
            $phim->CMND=$request->CMND;
            $phim->DiemTichLuy=$request->DiemTichLuy;
            $phim->save();
            return response()->json(['message' => 'success','phim'=>$phim]);
        } catch (Exception $e) {
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
        //
    }
    public function delete($id)
    {
        try{
            KhachHang::where('idKH', $id)->delete();
            return response()->json(['message' => 'xóa khách hàng thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
