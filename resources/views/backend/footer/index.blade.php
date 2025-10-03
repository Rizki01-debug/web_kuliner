<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Footer - KulinerCMS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/restoran/css/footer.css') }}">

</head>
<body>
    @extends('layouts.backend')

    @section('title', 'Management Footer')

    @section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-1 fw-bold">Management Footer</h1>
                    <p class="mb-0 text-muted">Kelola informasi footer restoran Anda</p>
                </div>
                @if ($footer)
                    <a href="{{ route('backoffice.footer.edit', $footer->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit Footer
                    </a>
                @endif
            </div>
        </div>

        <!-- Content -->
        @if ($footer)
            <div class="info-card">
                <table class="table info-table">
                    <tr>
                        <th>Title</th>
                        <td>{{ $footer->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $footer->description }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            {{ $footer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>
                            <i class="fas fa-phone text-muted me-2"></i>
                            {{ $footer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <i class="fas fa-envelope text-muted me-2"></i>
                            {{ $footer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>Newsletter Email</th>
                        <td>
                            <i class="fas fa-newspaper text-muted me-2"></i>
                            {{ $footer->newsletter_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>Open Hours</th>
                        <td>
                            <i class="fas fa-clock text-muted me-2"></i>
                            {{ $footer->open_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>Social Media</th>
                        <td>
                            <div class="d-flex flex-wrap gap-3">
                                @if($footer->facebook)
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-facebook social-icon"></i>
                                        <span class="small">{{ $footer->facebook }}</span>
                                    </div>
                                @endif
                                @if($footer->instagram)
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-instagram social-icon"></i>
                                        <span class="small">{{ $footer->instagram }}</span>
                                    </div>
                                @endif
                                @if($footer->twitter)
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-twitter social-icon"></i>
                                        <span class="small">{{ $footer->twitter }}</span>
                                    </div>
                                @endif
                                @if($footer->linkedin)
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-linkedin social-icon"></i>
                                        <span class="small">{{ $footer->linkedin }}</span>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-shoe-prints"></i>
                <h4 class="mb-2">Footer Belum Diatur</h4>
                <p class="mb-3 text-muted">Mulai dengan menambahkan informasi footer untuk restoran Anda</p>
                <a href="{{ route('backoffice.footer.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Footer
                </a>
            </div>
        @endif
    </div>
    @endsection

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>