@extends('layouts.backend')

@section('title', 'Management Services')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Management Services</h1>
    <a href="{{ route('backoffice.services.create') }}" class="btn btn-success mb-3">Tambah Service</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td>{{ Str::limit($service->description, 50) }}</td>
                            <td>{{ $service->icon }}</td>
                            <td>
                                <span class="badge bg-{{ $service->is_active ? 'success' : 'danger' }}">
                                    {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('backoffice.services.edit', $service) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('backoffice.services.destroy', $service) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
</form>

                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $services->links() }}
        </div>
    </div>
</div>
@endsection
