<?php

namespace App\Http\Controllers;

use App\Models\JenisTanaman;
use App\Models\Pegawai;
use App\Models\Tanaman;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Pegawai';
        $data['pegawai'] = Pegawai::all();
        $data['users'] = User::all();
        return view('masterdata.pegawai',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $validator = $request->validate([
    //         'user_id'=>'required',
    //         'nama' => 'required',
    //         'tmp_lahir' => 'required',
    //         'tgl_lahir' => 'required',
    //         'no_hp' => 'required|max:15'
    //    ]);
       $request['status'] = true;
       try {
            Pegawai::create($request->all());
            return redirect()->back()->with('success','Pegawai created');
       } catch (QueryException $e) {
            return redirect()->back()->with('error','error create pegawai');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pegawai::find($id);
        if ($data) {
            # code...
            return response()->json(['status'=>200,'data'=>$data]);
        }else{
            return response()->json(['status'=>404,'msg'=>'data not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pegawai::find($id);
        if($data){
                try {
                    $data->update($request->all());
                    return redirect()->back()->with('success','Pegawai Updated');
                } catch (QueryException $e) {
                    return redirect()->back()->with('error','update failed');
                }
        }else{
            return redirect()->back()->with('error','data not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::find($id);
        if($data){
            try {
                    $data->delete();
                    return response()->json(['status'=>201,'msg'=>'Deleted successfully']);
            } catch (QueryException $e) {
                    return response()->json(['status'=>500,'msg'=>$e->errorInfo]);
            }
       }else{
            return response()->json(['status'=>401,'msg'=>'Data not found']);
       }
    }
}
