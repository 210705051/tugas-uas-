@extends('layouts.app', ['title' => 'Tambah acara - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">Tambah Acara</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.acara.store') }}" method="POST" >
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">
                    
                    <div>
                        <label class="text-gray-700" for="nama_acara">Nama Acara</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="nama_acara" value="{{ old('nama_acara') }}" placeholder="Nama acara">
                        @error('nama_acara')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="tgl_acara">Tanggal Acara</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="date" name="tgl_acara" value="{{ old('tgl_acara') }}" placeholder="tgl_acara">
                        @error('tgl_acara')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="lokasi">Lokasi</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="lokasi" value="{{ old('lokasi') }}" placeholder="Lokasi">
                        @error('lokasi')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_pen" class="block text-gray-600 text-sm font-medium mb-2">Nama Penyelenggara</label>
                        <select name="id_pen" id="id_pen" class="form-select w-full">
                        @foreach($penyelenggaras as $penyelenggara)
                         <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <option value="{{ $penyelenggara->id_pen }}">{{ $penyelenggara->nama_pen }}</option>
                        @endforeach
                        </select>
                        @error('id_pen')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_par" class="block text-gray-600 text-sm font-medium mb-2">Nama partisipan</label>
                        <select name="id_par" id="id_par" class="form-select w-full">
                        @foreach($partisipans as $partisipan)
                         <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <option value="{{ $partisipan->id_par }}">{{ $partisipan->nama_par }}</option>
                        @endforeach
                        </select>
                        @error('id_par')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                                       

                </div>
                <div class="flex justify-start mt-4">
                    <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection