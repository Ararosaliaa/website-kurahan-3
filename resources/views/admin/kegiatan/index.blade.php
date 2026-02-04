@extends('admin.layout')

@section('content')
<h3>Data Kegiatan</h3>

<a href="/admin/kegiatan/create" class="btn btn-primary mb-3">+ Tambah Kegiatan</a>

<table class="table table-bordered">
    <tr>
        <th>Judul</th>
        <th>Aksi</th>
    </tr>
@foreach($data as $b)
<tr>
    <td>{{ $b->judul }}</td>
    <td>
        <a href="/admin/kegiatan/{{ $b->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
        <form action="/admin/kegiatan/{{ $b->id }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
