<?php

namespace App\Http\Controllers;

use App\Models\JenisTanaman;
use App\Models\Tanaman;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Tanaman';
        $data['tanaman'] = Tanaman::with('jenis')->get();
        $data['jenis'] = JenisTanaman::all();
        return view('masterdata.tanaman',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
          'gambar'=>'required',
          'nama' => 'required',
          'jenis_tanaman_id' => 'required',
          'khasiat' => 'required',
          'harga' => 'required|numeric'
       ]);
       if($validator->fails()){
            // return response()->json(['status'=>401,'errors' => $validator->errors()]);
            return redirect()->back()->with('error',$validator->errors());

       }
       try {
            $file = $request->file('gambar');
            $filename = time().".". $file->getClientOriginalExtension();

            // upload location
            $location = "files/images/";

            //upload file
            $file->move($location,$filename);
            // file path
            $filepath = $location.$filename;
            Tanaman::create([
                'slug' => Str::slug($request->nama,'-'),
                'gambar'=>$filepath,
                'nama'=>$request->nama,
                'jenis_tanaman_id'=>$request->jenis_tanaman_id,
                'khasiat'=>$request->khasiat,
                'harga'=>$request->harga
            ]);

            return redirect()->back()->with('success','Tanaman Created');
        } catch (QueryException $e) {
           return redirect()->back()->with('error','Tanaman Error');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tanaman::find($id);
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
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanaman $tanaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // dd($request->all());
        $data = Tanaman::find($id);
        $update = [
            'nama'=>$request->nama,
            'jenis_tanaman_id'=>$request->jenis_tanaman_id,
            'khasiat' => $request->khasiat,
            'harga'=>$request->harga
        ];
       if($data){
            try {
                if($request->sts_gambar == 1){
                    $file = $request->file('gambar');
                    $filename = time().".". $file->getClientOriginalExtension();

                    // upload location
                    $location = "files/images/";

                    //upload file
                    $file->move($location,$filename);

                    // file path
                    $filepath = $location.$filename;
                    $update['gambar'] = $filepath;
                }
                $data->update($update);
               return redirect()->back()->with('success','Data updated');
            } catch (QueryException $e) {
                return redirect()->back()->with('error','Error in update');
            }
       }else{
            return response()->json(['status'=>401,'msg'=>'Data not found']);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tanaman::find($id);
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
