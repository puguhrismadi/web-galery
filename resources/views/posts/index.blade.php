@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Galery Sekolah</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('gallery.create') }}" class="btn btn-md btn-success mb-3">Add Galery</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">isi</th>
                                    <th scope="col">penulis</th>
                                    <th scope="col" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gallery as $post)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/'.$post->gambar) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $post->judul }}</td>
                                        <td>{{ $post->isi }}</td>
                                        <td>{{ $post->penulis }} - {{ $post->status }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('gallery.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('gallery.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('gallery.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Gallery belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $gallery->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

@endsection