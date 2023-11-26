<?php

namespace App\Http\Controllers\TheLoai;

use App\Http\Controllers\Controller;
use App\Models\Phim;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Exception;
class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TheLoai::all());
    }
    public function trangchu()
    {
        // Lấy danh sách các thể loại
        $TheLoai = TheLoai::all();

        // Lấy danh sách các bộ phim theo từng thể loại
        $phim=Phim::all();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json(['TheLoai'=>$TheLoai,'Phims'=>$phim]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_create(){
        return view('TheLoai.TheLoai_create');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'TenTheLoai'=>'required',
            'MoTa'=>'required',
        ],
            ['TenTheLoai.required'=>'Tên Thể loại Không Được Để Trống',
            'MoTa.required'=>'mô tả Không Được Để Trống',
        ]);
        try {
            $phim = new TheLoai();
            $phim->TenTheLoai=$request->TenTheLoai;
            $phim->MoTa=$request->MoTa;
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
            'TenTheLoai'=>'required',
            'MoTa'=>'required',
        ],
            ['TenTheLoai.required'=>'Tên Thức Ăn Không Được Để Trống',
            'MoTa.required'=>'Đơn Giá Không Được Để Trống',
        ]);
        try{
            
            $phim = TheLoai::where('idTheLoai', $request->idTheLoai)->first();
            $phim->TenTheLoai=$request->TenTheLoai;
            $phim->MoTa=$request->MoTa;
            $phim->save();
            return response()->json(['message' => 'success']);
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
        //
    }
    public function delete($id)
    {
        try{
            TheLoai::where('idTheLoai', $id)->delete();
            return response()->json(['message' => 'xóa thể loại thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
