<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Menu - KulinerCMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/restoran/css/menus.css') }}">

</head>
<body>
    @extends('layouts.backend')

    @section('title', 'Manajemen Menu')

    @section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">Manajemen Menu</h1>
                    <p class="mb-0 opacity-75">Kelola menu makanan dan minuman restoran Anda</p>
                </div>
                <a href="{{ route('backoffice.menus.create') }}" class="btn btn-light">
                    <i class="fas fa-plus me-2"></i>Tambah Menu
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            @if($menus->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Judul Menu</th>
                        <th width="150">Harga</th>
                        <th width="120">Gambar</th>
                        <th width="120">Status</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $m)
                    <tr>
                        <td class="fw-bold">#{{ $m->id }}</td>
                        <td>
                            <div class="fw-semibold">{{ $m->title }}</div>
                            @if($m->description)
                            <small class="text-muted">{{ Str::limit($m->description, 50) }}</small>
                            @endif
                        </td>
                        <td class="fw-bold text-primary">Rp {{ number_format($m->price,0,',','.') }}</td>
                        <td>
                            @if($m->image)
                                <img src="{{ asset('storage/' . $m->image) }}" alt="{{ $m->title }}" class="menu-image">
                            @else
                                <div class="text-muted text-center">
                                    <i class="fas fa-image"></i>
                                    <small class="d-block">No Image</small>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($m->is_published)
                                <span class="status-badge status-published">
                                    <i class="fas fa-check-circle me-1"></i>Published
                                </span>
                            @else
                                <span class="status-badge status-draft">
                                    <i class="fas fa-clock me-1"></i>Draft
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('backoffice.menus.edit', $m) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('backoffice.menus.destroy', $m) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                                        <i class="fas fa-trash me-1"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <i class="fas fa-utensils"></i>
                <h4 class="mb-2">Belum Ada Menu</h4>
                <p class="mb-3">Mulai dengan menambahkan menu pertama Anda</p>
                <a href="{{ route('backoffice.menus.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Menu Pertama
                </a>
            </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($menus->count() > 0)
        <div class="pagination-container d-flex justify-content-center">
            {{ $menus->links() }}
        </div>
        @endif
    </div>
    @endsection

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>