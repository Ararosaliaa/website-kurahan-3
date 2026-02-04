@extends('layouts.app')

@section('title','Berita')

@section('content')
<div class="container">
    <h3 class="mb-4">Berita Desa</h3>

    <div class="row">
    @foreach($berita as $b)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/'.$b->gambar) }}"
                     class="card-img-top"
                     style="height:200px; object-fit:cover">

                <div class="card-body">
                    <h6>{{ $b->judul }}</h6>
                    <p>{{ Str::limit(strip_tags($b->isi),100) }}</p>
                    <a href="{{ route('berita.show',$b->id) }}"
                       class="btn btn-primary btn-sm">
                        Baca
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    {{ $berita->links() }}
</div>
@endsection
