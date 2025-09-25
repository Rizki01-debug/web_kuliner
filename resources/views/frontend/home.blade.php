@extends('layouts.app') 

@section('title', 'Home')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold text-primary mb-3">
                <i class="fas fa-heart text-danger me-2"></i>Menu Favorit
            </h1>
            <p class="lead text-muted">Nikmati pilihan menu terbaik yang paling disukai pelanggan kami</p>
        </div>
    </div>

    <div class="row">
        @forelse($favorites as $menu)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="position-relative">
                        @if($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $menu->nama }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                 style="height: 200px;">
                                <i class="fas fa-utensils fa-3x text-muted"></i>
                            </div>
                        @endif
                        <span class="position-absolute top-0 end-0 m-3 badge bg-danger">
                            <i class="fas fa-heart me-1"></i>Favorit
                        </span>
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark">{{ $menu->nama }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit($menu->deskripsi, 100) }}</p>
                        
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('menu.show', $menu->id) }}" 
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>Lihat Detail
                                </a>
                                <small class="text-muted">
                                    <i class="fas fa-star text-warning me-1"></i>4.5
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-heart-broken fa-4x text-muted mb-3"></i>
                    <h3 class="text-muted">Belum ada menu favorit</h3>
                    <p class="text-muted">Mulai jelajahi menu kami dan tandai yang menjadi favorit Anda</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-compass me-1"></i>Jelajahi Menu
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    @if($favorites->count() > 0)
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="{{ route('menu.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-utensils me-1"></i>Lihat Semua Menu
            </a>
        </div>
    </div>
    @endif
</div>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    
    .btn-primary {
        background: linear-gradient(45deg, #007bff, #0056b3);
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1.5rem;
    }
    
    .btn-primary:hover {
        background: linear-gradient(45deg, #0056b3, #004494);
        transform: translateY(-1px);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animasi kartu saat dimuat
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 * index);
        });
    });
</script>
@endsection