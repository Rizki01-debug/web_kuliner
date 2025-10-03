<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KulinerCMS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('build/restoran/css/dashboard.css') }}">

</head>
<body>
    <!-- Extends Layout Backend -->
    @extends('layouts.backend')

    @section('content')
    <div class="container mt-4">
        <!-- Header -->
        <div class="dashboard-header">
            <h1 class="display-5 fw-bold">Dashboard</h1>
            <p class="welcome-text">Selamat datang di dashboard KulinerCMS! Kelola restoran Anda dengan mudah.</p>
        </div>

        <!-- Statistik Cards -->
        <div class="row mt-4">
            <!-- Total Menu -->
            <div class="col-md-6 mb-4">
                <div class="card dashboard-card text-white card-menu">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-utensils card-icon"></i>
                                <h5 class="card-title">Total Menu</h5>
                                <p class="card-value">{{ $menuCount ?? 0 }}</p>
                            </div>
                            <div class="text-end">
                                <small>Menu Tersedia</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Newsletter -->
            <div class="col-md-6 mb-4">
                <div class="card dashboard-card text-white card-newsletter">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-newspaper card-icon"></i>
                                <h5 class="card-title">Total Newsletter</h5>
                                <p class="card-value">{{ $newsletterCount ?? 0 }}</p>
                            </div>
                            <div class="text-end">
                                <small>Subscriber</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>