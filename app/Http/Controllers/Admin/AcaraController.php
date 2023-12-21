<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Partisipan;
use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
   // Menampilkan daftar acara
   public function index(){
    $acaras = Acara::latest()->when(request()->q, function($acaras){
        $acaras = $acaras->where ("nama_acara", "like", "%". request()->q ."%");
   })->paginate(10);
   $acaras = Acara::with(['penyelenggara', 'partisipan'])->paginate(10);
   return view("admin.acara.index", compact("acaras"));
}

// Menampilkan form untuk membuat acara baru
public function create()
{
    $penyelenggaras = Penyelenggara::all();
    $partisipans = Partisipan::all();

    return view('admin.acara.create', compact('penyelenggaras', 'partisipans'));
}

// Menyimpan data acara baru
public function store(Request $request)
{
    $request->validate([
        'nama_acara'=> 'required|:acaras',
        'tgl_acara'=> 'required|:acaras',
        'lokasi'=> 'required|:acaras',
        'id_pen' => 'required|exists:penyelenggaras,id_pen',
        'id_par' => 'required|exists:partisipans,id_par',
        
    ]);

    $acara = Acara::create([
        'nama_acara'=> $request->nama_acara,
        'tgl_acara'=> $request->tgl_acara,
        'lokasi'=> $request->lokasi,
        'id_pen' => $request->id_pen,
        'id_par' => $request->id_par,
    ]);
    if($acara){
        return redirect()->route('admin.acara.index')->with(['success'=>'data berhasil di tambah ke dalam table kategori']);
    }else{
        return redirect()->route('admin.acara.index')->with(['error'=>'data Gagal di tambah ke dalam table kategori']);
    }
    
}

// Menampilkan form untuk mengedit acara
public function edit(Acara $acara)
{
    $acara = Acara::findOrFail($acara->id_acara);
    $penyelenggaras = Penyelenggara::all();
    $partisipans = Partisipan::all();

    return view('admin.acara.edit', compact('acara', 'penyelenggaras', 'partisipans'));

}

// Menyimpan data acara yang sudah diubah
public function update(Request $request, Acara $acara)
{
    $request->validate([
        'nama_acara'=> 'required|:acaras,nama_acara',
        'tgl_acara'=> 'required|:acaras,tgl_acara',
        'lokasi'=> 'required|:acaras,lokasi',
        'id_pen' => 'required|exists:penyelenggaras,id_pen',
        'id_par' => 'required|exists:partisipans,id_par',
      
        
    ]);

    $acara = Acara::findOrFail($acara->id_acara);


    // Update data acara
    $acara->update([
        'nama_acara' => $request->nama_acara,
        'tgl_acara' => $request->tgl_acara,
        'lokasi' => $request->lokasi,
        'id_pen' => $request->id_pen,
        'id_par' => $request->id_par,
      
    ]);

    // Redirect ke halaman index dengan pesan sukses
    if($acara){
        return redirect()->route('admin.acara.index')->with(['success'=>'data berhasil di tambah ke dalam table kategori']);
    }else{
        return redirect()->route('admin.acara.index')->with(['error'=>'data Gagal di tambah ke dalam table kategori']);
    }
}

public function destroy($id){
    $acara = Acara::findOrFail($id);
    $acara->delete();

    //kondisi dalam hapus
    if($acara){
        return response()->json(['status'=> 'success']);
    }else{
        return response()->json(['status'=> 'error']);
    }
}
}
