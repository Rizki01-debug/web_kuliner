<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Management - KulinerCMS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/restoran/css/newsletter.css') }}">
</head>
<body>
    @extends('layouts.backend')

    @section('title', 'Newsletter Management')

    @section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-1 fw-bold">Newsletter Management</h1>
                    <p class="mb-0 text-muted">Kelola subscriber newsletter restoran Anda</p>
                </div>
                <div class="text-muted">
                    <i class="fas fa-users me-2"></i>
                    Total: {{ $newsletters->total() }} Subscriber
                </div>
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
            <table class="table">
                <thead>
                    <tr>
                        <th width="45%">Email</th>
                        <th width="35%">Tanggal Daftar</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newsletters as $newsletter)
                        <tr>
                            <td class="email-cell">
                                <i class="fas fa-envelope text-muted me-2"></i>
                                {{ $newsletter->email }}
                            </td>
                            <td class="date-cell">
                                <i class="fas fa-calendar text-muted me-2"></i>
                                {{ $newsletter->created_at->format('d M Y') }}
                                <small class="d-block text-muted mt-1">
                                    {{ $newsletter->created_at->format('H:i') }}
                                </small>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('backoffice.newsletter.destroy', $newsletter) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button onclick="return confirm('Apakah Anda yakin ingin menghapus email {{ $newsletter->email }} dari newsletter?')" 
                                            class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">
                                <div class="empty-state">
                                    <i class="fas fa-newspaper"></i>
                                    <h4 class="mb-2">Belum Ada Subscriber</h4>
                                    <p class="mb-0 text-muted">Belum ada email yang terdaftar di newsletter</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($newsletters->hasPages())
        <div class="pagination-container d-flex justify-content-center">
            {{ $newsletters->links() }}
        </div>
        @endif
    </div>
    @endsection

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>