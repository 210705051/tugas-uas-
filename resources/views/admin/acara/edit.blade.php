@extends('layouts.app', ['title' => 'Edit acara - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md"> 
            <h2 class="text-lg text-gray-700 font-semibold capitalize">EDIT KATEGORI</h2>
         <hr class="mt-4">
        <form action="{{ route('admin.acara.update', $acara->id_acara) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT') 
            <div class="grid grid-cols-1 gap-6 mt-4"> 
                
                <div> 
                    <label class="text-gray-700" for="id_acara">ID acara</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="id_acara" value="{{ old('id_acara',$acara->id_acara) }}" readonly>
                    @error('id_acara')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="nama_acara">Nama Acara</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="nama_acara" value="{{ old('nama_acara',$acara->nama_acara) }}">
                    @error('nama_acara')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="tgl_acara">Tgl Acara</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="date" name="tgl_acara" value="{{ old('tgl_acara',$acara->tgl_acara) }}" >
                    @error('tgl_acara')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div> 
                    <label class="text-gray-700" for="lokasi">Lokasi</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="lokasi" value="{{ old('lokasi',$acara->lokasi) }}" >
                    @error('lokasi')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="id_pen" class="block text-gray-600 text-sm font-medium mb-2">Pilih penyelenggara</label>
                    <select name="id_pen" id="id_pen" class="form-select w-full">
                        @foreach($penyelenggaras as $penyelenggara)
                            <option value="{{ $penyelenggara->id_pen }}" {{ $acara->id_pen == $penyelenggara->id_pen ? 'selected' : '' }}>
                                {{ $penyelenggara->nama_pen }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_pen')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="id_par" class="block text-gray-600 text-sm font-medium mb-2">Pilih partisipan</label>
                    <select name="id_par" id="id_par" class="form-select w-full">
                        @foreach($partisipans as $partisipan)
                            <option value="{{ $partisipan->id_par }}" {{ $acara->id_par == $partisipan->id_par ? 'selected' : '' }}>
                                {{ $partisipan->nama_par }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_par')
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