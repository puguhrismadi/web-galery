@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div>
                        <h3 class="text-center my-4">Form Edit Galery Sekolah</h3>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                            
                                <!-- error message untuk image -->
                                @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $gallery->judul) }}" placeholder="Masukkan Judul Gallery">
                            
                                <!-- error message untuk title -->
                                @error('judul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Isi</label>
                                <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" rows="5" placeholder="Masukkan isi deskripsi galery">{{ old('isi', $gallery->isi) }} </textarea>
                            
                                <!-- error message untuk description -->
                                @error('isi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Kategori Gallery</label>
                                        <input type="number" class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" value="{{ old('kategori_id', $gallery->kategori_id )}}" placeholder="Masukkan Kategori Galery">
                                    
                                        <!-- error message untuk price -->
                                        @error('kategori_id')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Penulis (auto) </label>
                                        <input type="hidden" value="{{ Auth::user()->id }}" name="petugas_id">
                                        <input type="hidden" name="status" value="1">
                                        <input readonly="readonly" type="text" class="form-control"  name="penulis_name" value="{{ Auth::user()->name }}" >
                                    
                            
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('isi');
    </script>
    
@endsection