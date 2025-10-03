<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Services - KulinerCMS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/restoran/css/service.css') }}">

</head>
<body>
    @extends('layouts.backend')

    @section('title', 'Management Services')

    @section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-1 fw-bold">Management Services</h1>
                    <p class="mb-0 text-muted">Kelola layanan yang ditawarkan restoran Anda</p>
                </div>
                <a href="{{ route('backoffice.services.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Tambah Service
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
            @if($services->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th width="25%">Judul</th>
                        <th width="30%">Deskripsi</th>
                        <th width="20%">Icon</th>
                        <th width="15%">Status</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td class="fw-semibold">{{ $service->title }}</td>
                        <td class="description-cell">
                            <div class="description-text">
                                {{ $service->description }}
                            </div>
                        </td>
                        <td>
                            <div class="icon-preview">
                                <div class="service-icon">
                                    @if(strpos($service->icon, 'fa-') !== false)
                                        <i class="{{ $service->icon }}"></i>
                                    @else
                                        <i class="fas fa-question"></i>
                                    @endif
                                </div>
                                <div class="icon-name">
                                    {{ $service->icon }}
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($service->is_active)
                                <span class="status-badge status-active">
                                    <i class="fas fa-check-circle me-1"></i>Aktif
                                </span>
                            @else
                                <span class="status-badge status-inactive">
                                    <i class="fas fa-times-circle me-1"></i>Nonaktif
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('backoffice.services.edit', $service) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('backoffice.services.destroy', $service) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus service {{ $service->title }}?')">
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
                <i class="fas fa-concierge-bell"></i>
                <h4 class="mb-2">Belum Ada Services</h4>
                <p class="mb-3 text-muted">Mulai dengan menambahkan layanan untuk restoran Anda</p>
                <a href="{{ route('backoffice.services.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Tambah Service Pertama
                </a>
            </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($services->count() > 0)
        <div class="pagination-container d-flex justify-content-center">
            {{ $services->links() }}
        </div>
        @endif
    </div>
    @endsection

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>