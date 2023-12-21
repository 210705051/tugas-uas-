<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partisipan;
use Illuminate\Http\Request;

class PartisipanController extends Controller
{
    //untuk menampilkan data dari index partisipan
    public function index(){
        $partisipans = Partisipan::latest()->when(request()->q, function($partisipans){
             $partisipans = $partisipans->where ("nama_par", "like", "%". request()->q ."%");
        })->paginate(10);
        return view("admin.partisipan.index", compact("partisipans"));
    }

    //inputan data
    public function create(){
        return view("admin.partisipan.create");
    }

    //bagian store
    public function store(Request $request){
        // validasi
        $this->validate($request, [
            "nama_par"=> "required|:partisipans",
            "email"=> "required|:partisipans",
            "kontak"=> "required|:partisipans",
            "alamat"=> "required|:partisipans",
            "tgl_reg"=> "required|:partisipans",
            
        ]);

        //data yang akan di simpan
        $partisipan = Partisipan::create([
            'nama_par'=> $request->nama_par,
            'email'=> $request->email,
            'kontak'=> $request->kontak,
            'alamat'=> $request->alamat,
            'tgl_reg'=> $request->tgl_reg,
        ]);

        // kondisi
        if($partisipan){
            return redirect()->route('admin.partisipan.index')->with(['success'=>'data berhasil di tambah']);
        }else{
            return redirect()->route('admin.partisipan.index')->with(['error'=>'data Gagal di tambah']);
        }
    }


     //Menampilkan ubah data
     public function edit(Partisipan $partisipan){
        return view('admin.partisipan.edit', compact('partisipan'));
    }

    //untuk mengirim data baru
    public function update(Request $request, Partisipan $partisipan){
        //validasi data
        $this->validate($request, [
            'nama_par'=> 'required|:partisipans,nama_par,' .$partisipan->id,
            'email'=> 'required|:partisipans,email,' .$partisipan->id,
            'kontak'=> 'required|:partisipans,kontak,' .$partisipan->id,
            'alamat'=> 'required|:partisipans,alamat,' .$partisipan->id,
            'tgl_reg'=> 'required|:partisipans,tgl_reg,' .$partisipan->id,
        ]);

            //upload data
            $partisipan = Partisipan::findOrFail($partisipan->id_par);
            $partisipan->update([
                'nama_par' => $request->nama_par,
                'email' => $request->email,
                'kontak' => $request->kontak,
                'alamat' => $request->alamat,
                'tgl_reg' => $request->tgl_reg,
            ]);
        
       
        if($partisipan){
            return redirect()->route('admin.partisipan.index')->with(['success'=> 'Data Berhasil Di Ubah']);
        }else {
            return redirect()->route('admin.partisipan.index')->with(['error'=> 'Data Gagal Di Ubah']);
        }
    }
    //Hapus data
    public function destroy($id){
        $partisipan = Partisipan::findOrFail($id);
        $partisipan->delete();

        if($partisipan){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['status'=> 'error']);
        }
    }
}
