<?php

namespace App\Http\Controllers\Phim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phim;
use App\Models\TheLoai;
use Exception;
class PhimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Phim::all());
    }
    public function trangchu()
    {
        return view('Home.TrangChu',['phim'=>Phim::all(),'theloai'=>TheLoai::all()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
{
    $request->validate([
        'TenPhim'=>'required',
        'MoTa'=>'required',
        'ThoiLuong'=>'required',
        'NgayKhoiChieu'=>'required',
        'HangSanXuat'=>'required',
        'DaoDien'=>'required',
        'NamSX'=>'required',
        'idTheLoai'=>'required',
    ],
        ['TenPhim.required'=>'Tên Không Được Để Trống',
        'MoTa.required'=>'Mô Tả Không Được Để Trống',
        'ThoiLuong.required'=>'Thời Lượng Không Được Để Trống',
        'NgayKhoiChieu.required'=>'Ngày Khởi Chiếu Không Được Để Trống',
        'HangSanXuat.required'=>'Hãng Sản Xuất Không Được Để Trống',
        'DaoDien.required'=>'Đạo Diễn Không Được Để Trống',
        'NamSX.required'=>'Năm Sản Xuất Không Được Để Trống',
        'idTheLoai.required'=>'Thể Loại Không Được Để Trống',
    ]);
    try {
        $phim = new Phim();
        $phim->TenPhim=$request->TenPhim;
        $phim->MoTa=$request->MoTa;
        $phim->ThoiLuong=$request->ThoiLuong;
        $phim->NgayKhoiChieu=$request->NgayKhoiChieu;
        $phim->HangSanXuat=$request->HangSanXuat;
        $phim->DaoDien=$request->DaoDien;
        $phim->NamSX=$request->NamSX;
        $phim->idTheLoai=$request->idTheLoai;
        if ($request->file('anh')) {
            $file = $request->file('anh');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('assets/Image'), $filename);
            $phim->ApPhich = $filename;
        }
        $phim->save();

        return response()->json(['message' => 'Thêm bộ phim thành công']);
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
        try{
            
            $phim = Phim::where('idPhim', $request->idPhim)->first();
            $phim->TenPhim=$request->TenPhim;
            $phim->MoTa=$request->MoTa;
            $phim->ThoiLuong=$request->ThoiLuong;
            $phim->NgayKhoiChieu=$request->NgayKhoiChieu;
            $phim->HangSanXuat=$request->HangSanXuat;
            $phim->DaoDien=$request->DaoDien;
            $phim->NamSX=$request->NamSX;
            $phim->idTheLoai=$request->idTheLoai;
            if ($request->file('anh')) {
                $file = $request->file('anh');
                $filename =$file->getClientOriginalName();
                $file->move(public_path('assets/Image'), $filename);
                $phim->ApPhich = $filename;
            }
            $phim->save();
            return response()->json(['message' => 'sửa bộ phim thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function get_create(){
        $loaiphim=TheLoai::all();
        return view('Phim.Phim_create',['loaiphim'=>$loaiphim]);
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
    public function get_update($id)
    {
        try{
            $loaiphim=TheLoai::all();
            $phim=Phim::where('idPhim',$id)->get();
            return view('Phim.Phim_update',['loaiphim'=>$loaiphim,'phim'=>$phim]);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        try{
            Phim::where('idPhim', $id)->delete();
            return response()->json(['message' => 'xóa bộ phim thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
 
}
