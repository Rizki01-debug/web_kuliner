@extends('layouts.app') 

@section('title', 'Home')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Selamat Datang di Aplikasi Kuliner</h1>
        <p class="text-muted">Eksplor menu favoritmu di sini 🍽️</p>
    </div>

    <div class="row">
        <!-- contoh card menu -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Menu">
                <div class="card-body">
                    <h5 class="card-title">Nasi Goreng Spesial</h5>
                    <p class="card-text text-muted">Nasi goreng dengan topping ayam dan telur mata sapi.</p>
                    <a href="{{ route('menu.show', 1) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- tambahin card lain sesuai kebutuhan -->
    </div>
</div>
@endsection
