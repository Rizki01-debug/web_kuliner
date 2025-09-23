@extends('layouts.backend')

@section('title', 'Manajemen Menu')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Manajemen Menu</h1>
  <a href="{{ route('backoffice.menus.create') }}" class="btn btn-primary">Tambah Menu</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Harga</th>
      <th>Gambar</th>
      <th>Published</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($menus as $m)
    <tr>
      <td>{{ $m->id }}</td>
      <td>{{ $m->title }}</td>
      <td>Rp {{ number_format($m->price,0,',','.') }}</td>
      <td>
        @if($m->image)
          <img src="{{ asset('storage/' . $m->image) }}" alt="" style="width:80px;height:auto;">
        @endif
      </td>
      <td>{{ $m->is_published ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('backoffice.menus.edit', $m) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('backoffice.menus.destroy', $m) }}" method="POST" style="display:inline;">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus menu?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $menus->links() }}
@endsection
