<main>
@extends('layouts.backend')

@section('title', 'About Management')

@section('content')
<h2>About Management</h2>

<a href="{{ route('backoffice.about.create') }}" class="btn btn-primary mb-3">Tambah About</a>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($abouts as $about)
      <tr>
        <td>{{ $about->title }}</td>
        <td>{{ Str::limit($about->description, 50) }}</td>
        <td>
          @if($about->image)
            <img src="{{ asset('storage/'.$about->image) }}" alt="" width="100">
          @endif
        </td>
        <td>
          <a href="{{ route('backoffice.about.edit', $about) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('backoffice.about.destroy', $about) }}" method="POST" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
</main>
