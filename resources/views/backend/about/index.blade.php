<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Management - KulinerCMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/restoran/css/about.css') }}">

</head>
<body>
    @extends('layouts.backend')

    @section('title', 'About Management')

    @section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-0">About Management</h1>
                    <p class="mb-0 opacity-75">Kelola konten halaman tentang restoran Anda</p>
                </div>
                <a href="{{ route('backoffice.about.create') }}" class="btn btn-light">
                    <i class="fas fa-plus me-2"></i>Tambah About
                </a>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Table -->
        <div class="table-container">
            @if($abouts->count() > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="200">Judul</th>
                        <th>Deskripsi</th>
                        <th width="120">Gambar</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abouts as $about)
                    <tr>
                        <td class="fw-semibold">{{ $about->title }}</td>
                        <td class="description-cell">
                            <div class="description-text">
                                {{ $about->description }}
                            </div>
                        </td>
                        <td>
                            @if($about->image)
                                <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}" class="about-image">
                            @else
                                <div class="text-muted text-center">
                                    <i class="fas fa-image"></i>
                                    <small class="d-block">No Image</small>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('backoffice.about.edit', $about) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('backoffice.about.destroy', $about) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus konten about ini?')">
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
                <i class="fas fa-info-circle"></i>
                <h4 class="mb-2">Belum Ada Konten About</h4>
                <p class="mb-3">Mulai dengan menambahkan konten tentang restoran Anda</p>
                <a href="{{ route('backoffice.about.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Konten About
                </a>
            </div>
            @endif
        </div>
    </div>
    @endsection

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>