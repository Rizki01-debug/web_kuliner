<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Users - KulinerCMS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: #f8f9fa;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: all 0.3s;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 2rem 0 rgba(58, 59, 69, 0.2);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }
        
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table thead th {
            background-color: #1a1d28;
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #e9ecef;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .badge-admin {
            background: linear-gradient(135deg, #198754 0%, #146c43 100%);
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
        
        .badge-user {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
        
        .action-buttons .btn {
            padding: 0.3rem 0.8rem;
            margin: 0 0.15rem;
            border-radius: 6px;
            font-size: 0.85rem;
        }
        
        .page-title {
            color: #1a1d28;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        
        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }
        
        .page-link {
            border: none;
            border-radius: 8px;
            margin: 0 0.2rem;
            color: #1a1d28;
            font-weight: 500;
        }
        
        .page-item.active .page-link {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }
    </style>
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