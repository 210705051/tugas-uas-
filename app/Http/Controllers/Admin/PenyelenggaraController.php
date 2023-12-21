<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class PenyelenggaraController extends Controller
{
    //untuk menampilkan data dari index penyelenggara
    public function index(){
        $penyelenggaras = Penyelenggara::latest()->when(request()->q, function($penyelenggaras){
             $penyelenggaras = $penyelenggaras->where ("nama_pen", "like", "%". request()->q ."%");
        })->paginate(10);
        return view("admin.penyelenggara.index", compact("penyelenggaras"));
    }

    //inputan data
    public function create(){
        return view("admin.penyelenggara.create");
    }

    //bagian store
    public function store(Request $request){
        // validasi
        $this->validate($request, [
            "nama_pen"=> "required|:penyelenggaras",
            "kontak"=> "required|:penyelenggaras",
            "email"=> "required|:penyelenggaras",
            "alamat"=> "required|:penyelenggaras",
            
        ]);

        //data yang akan di simpan
        $penyelenggara = Penyelenggara::create([
            'nama_pen'=> $request->nama_pen,
            'kontak'=> $request->kontak,
            'email'=> $request->email,
            'alamat'=> $request->alamat,
        ]);

        // kondisi
        if($penyelenggara){
            return redirect()->route('admin.penyelenggara.index')->with(['success'=>'data berhasil di tambah']);
        }else{
            return redirect()->route('admin.penyelenggara.index')->with(['error'=>'data Gagal di tambah']);
        }
    }


     //Menampilkan ubah data
     public function edit(Penyelenggara $penyelenggara){
        return view('admin.penyelenggara.edit', compact('penyelenggara'));
    }

    //untuk mengirim data baru
    public function update(Request $request, Penyelenggara $penyelenggara){
        //validasi data
        $this->validate($request, [
            'nama_pen'=> 'required|:penyelenggaras,nama_pen,' .$penyelenggara->id,
            'kontak'=> 'required|:penyelenggaras,kontak,' .$penyelenggara->id,
            'email'=> 'required|:penyelenggaras,email,' .$penyelenggara->id,
            'alamat'=> 'required|:penyelenggaras,alamat,' .$penyelenggara->id,
        ]);

            //upload data
            $penyelenggara = Penyelenggara::findOrFail($penyelenggara->id_pen);
            $penyelenggara->update([
                'nama_pen' => $request->nama_pen,
                'kontak' => $request->kontak,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ]);
        
       
        if($penyelenggara){
            return redirect()->route('admin.penyelenggara.index')->with(['success'=> 'Data Berhasil Di Ubah']);
        }else {
            return redirect()->route('admin.penyelenggara.index')->with(['error'=> 'Data Gagal Di Ubah']);
        }
    }
    //Hapus data
    public function destroy($id){
        $penyelenggara = Penyelenggara::findOrFail($id);
        $penyelenggara->delete();

        if($penyelenggara){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['status'=> 'error']);
        }
    }
}
