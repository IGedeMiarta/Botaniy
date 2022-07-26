<?php

namespace App\Http\Controllers;

use App\Models\JenisTanaman;
use DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Jenis Tanaman';
        $data['jenis'] = JenisTanaman::all();
        $tgl2 = new DateTime("2020-01-20");
        return view('masterdata.jenis_tanaman',$data);
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
        $validator = Validator::make($request->all(),[
          'file'=>'required',
          'nama' => 'required',
          'detail' => 'required',
       ]);
    //    dd($request->all());
       if($validator->fails()){
            return response()->json(['status'=>401,'errors' => $validator->errors()]);
       }
       try {
          if($request->file('file')){
               $file = $request->file('file');
               $filename = time().".". $file->getClientOriginalExtension();

               // upload location
               $location = "files/images/";

               //upload file
               $file->move($location,$filename);

               // file path
               $filepath = $location.$filename;
               $request['gambar'] = $filepath;

          }
          JenisTanaman::create($request->all());
          return response()->json(['status'=>201,'msg'=>'Created successfully']);
       } catch (QueryException $e) {
          return response()->json(['status'=>500,'msg'=>$e->errorInfo]);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = JenisTanaman::find($id);
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
    public function update(Request $request, $id)
    {
        dd($request->all());
        // return response()->json(['data'=>$request->all()],200);
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
}
