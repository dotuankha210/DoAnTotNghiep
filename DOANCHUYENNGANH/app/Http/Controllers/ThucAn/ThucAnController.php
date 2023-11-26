<?php

namespace App\Http\Controllers\ThucAn;

use App\Http\Controllers\Controller;
use App\Models\ThucAn;
use Illuminate\Http\Request;
use Exception;
class ThucAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ThucAn::all());
    }
    public function get_create(){
        return view('ThucAn.ThucAn_create');
    }
    public function get_update($id)
    {
        try{
            $thucan=ThucAn::where('MATHUCAN',$id)->get();
            return view('ThucAn.ThucAn_update',['thucan'=>$thucan]);
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
    public function create(Request $request)
    {
        $request->validate([
            'TENTHUCAN'=>'required',
            'DONGIA'=>'required',
        ],
            ['TENTHUCAN.required'=>'Tên Thức Ăn Không Được Để Trống',
            'DONGIA.required'=>'Đơn Giá Không Được Để Trống',
        ]);
        try {
            $phim = new ThucAn();
            $phim->TENTHUCAN=$request->TENTHUCAN;
            $phim->DONGIA=$request->DONGIA;
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
            'TENTHUCAN'=>'required',
            'DONGIA'=>'required',
        ],
            ['TENTHUCAN.required'=>'Tên Thức Ăn Không Được Để Trống',
            'DONGIA.required'=>'Đơn Giá Không Được Để Trống',
        ]);
        try{
            
            $phim = ThucAn::where('MATHUCAN', $request->MATHUCAN)->first();
            $phim->TENTHUCAN=$request->TENTHUCAN;
            $phim->DONGIA=$request->DONGIA;
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
            ThucAn::where('MATHUCAN', $id)->delete();
            return response()->json(['message' => 'xóa thức ăn thành công']);
        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
