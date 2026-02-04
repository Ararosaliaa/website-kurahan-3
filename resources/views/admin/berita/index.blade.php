@extends('admin.layout')

@section('title', 'Berita')
@section('header', 'Manajemen Berita')

@section('content')
<a href="/admin/berita/create" class="btn btn-primary mb-3">
    ➕ Tambah Berita
</a>

<table class="table table-bordered table-hover">
<thead class="table-dark">
<tr>
    <th>Judul</th>
    <th width="180">Aksi</th>
</tr>
</thead>

<tbody>
@foreach($data as $b)
<tr>
    <td>{{ $b->judul }}</td>
    <td>
        <a href="/admin/berita/{{ $b->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

        <form action="/admin/berita/{{ $b->id }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $data->links() }}
@endsection
