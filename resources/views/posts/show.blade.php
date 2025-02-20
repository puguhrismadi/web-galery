@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <img src="{{ asset('/storage/'.$gallery->gambar) }}" class="rounded" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3>{{ $gallery->judul }}</h3>
                    <h5>{{ $gallery->petugas_id }} | {{ $gallery->created_at }}</h5>
                    <hr/>
                    <p>{!! $gallery->isi !!}</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection