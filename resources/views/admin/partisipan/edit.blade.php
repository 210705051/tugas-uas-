@extends('layouts.app', ['title' => 'Edit partisipan - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md"> 
            <h2 class="text-lg text-gray-700 font-semibold capitalize">EDIT partisipan</h2> 
            <hr class="mt-4">
        <form action="{{ route('admin.partisipan.update', $partisipan->id_par) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT') 
            <div class="grid grid-cols-1 gap-6 mt-4"> 
               
                <div> 
                    <label class="text-gray-700" for="id_par">ID partisipan</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="id_par" value="{{ old('id_par',$partisipan->id_par) }}" readonly>
                    @error('id_par')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="nama_par">Nama partisipan</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="nama_par" value="{{ old('nama_par',$partisipan->nama_par) }}" placeholder="Nama partisipan">
                    @error('nama_par')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="email">Email</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="email" value="{{ old('email',$partisipan->email) }}" placeholder="email">
                    @error('email')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="kontak">Kontak</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="kontak" value="{{ old('kontak',$partisipan->kontak) }}" placeholder="kontak">
                    @error('kontak')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="alamat">Alamat</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="alamat" value="{{ old('alamat',$partisipan->alamat) }}" placeholder="alamat">
                    @error('alamat')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="tgl_reg">Tgl Reg</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="tgl_reg" value="{{ old('tgl_reg',$partisipan->tgl_reg) }}" placeholder="tgl_reg">
                    @error('tgl_reg')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>


                
            </div>
            <div class="flex justify-start mt-4">
                <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">UPDATE</button>
            </div>
        </form>
    </div>
</div>
</main>
@endsection