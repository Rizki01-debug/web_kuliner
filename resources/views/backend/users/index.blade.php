<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Users - KulinerCMS</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/restoran/css/users.css') }}">

</head>
<body>
    <!-- Layout Backend (Simulasi) -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (Simulasi) -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <!-- Sidebar content -->
            </nav>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- Section Content -->
                @extends('layouts.backend')
                
                @section('title', 'Manajemen Users')
                
                @section('content')
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="page-title">Manajemen Users</h1>
                        <p class="page-subtitle">Kelola data pengguna sistem KulinerCMS</p>
                    </div>
                    <a href="{{ route('backoffice.users.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-2"></i>Tambah User
                    </a>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        @if($users->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Tanggal Daftar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $u)
                                    <tr>
                                        <td><strong>#{{ $u->id }}</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                    <span class="text-white fw-bold">{{ substr($u->name, 0, 1) }}</span>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold">{{ $u->name }}</div>
                                                    <small class="text-muted">User ID: {{ $u->id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            @if($u->is_admin)
                                                <span class="badge badge-admin rounded-pill">
                                                    <i class="fas fa-crown me-1"></i>Admin
                                                </span>
                                            @else
                                                <span class="badge badge-user rounded-pill">
                                                    <i class="fas fa-user me-1"></i>User
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $u->created_at->format('d M Y') }}</td>
                                        <td class="action-buttons">
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('backoffice.users.edit', $u) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('backoffice.users.destroy', $u) }}" method="POST" class="d-inline ms-1">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                        <i class="fas fa-trash me-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted">
                                Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }} user
                            </div>
                            <nav>
                                {{ $users->links() }}
                            </nav>
                        </div>
                        @else
                        <div class="empty-state">
                            <i class="fas fa-users"></i>
                            <h4>Belum ada user</h4>
                            <p>Mulai dengan menambahkan user pertama Anda</p>
                            <a href="{{ route('backoffice.users.create') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-plus-circle me-2"></i>Tambah User Pertama
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endsection
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Konfirmasi penghapusan dengan sweet alert style
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('form[method="POST"]');
            
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    if (button.textContent.includes('Hapus')) {
                        e.preventDefault();
                        if (confirm('Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.')) {
                            this.submit();
                        }
                    }
                });
            });
            
            // Style pagination links
            const paginationLinks = document.querySelectorAll('.pagination a');
            paginationLinks.forEach(link => {
                link.classList.add('page-link');
            });
            
            const paginationItems = document.querySelectorAll('.pagination li');
            paginationItems.forEach(item => {
                item.classList.add('page-item');
            });
        });
    </script>
</body>
</html>