@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5>Total Berita</h5>
                <h2>{{ $berita }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5>Total Kegiatan</h5>
                <h2>{{ $kegiatan }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
