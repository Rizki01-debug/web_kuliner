@extends('layouts.app2')

@section('title', $menu->title)

@section('content')

    <!-- Hero Start -->
    <div class="container-fluid bg-dark hero-header mb-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 text-center">
                    <h1 class="display-4 text-white mb-4 animated slideInDown">Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Menu Detail Start -->
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            
            <!-- Image -->
            <div class="col-md-6">
                @if($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" 
                         class="img-fluid rounded shadow-sm" 
                         alt="{{ $menu->title }}">
                @endif
            </div>

            <!-- Content -->
            <div class="col-md-6">
                <h1 class="mb-3">{{ $menu->title }}</h1>
                <p class="mb-4">{{ $menu->description }}</p>
                <h4 class="text-primary mb-4">Rp {{ number_format($menu->price, 0, ',', '.') }}</h4>

                <a href="{{ route('menu.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <!-- Menu Detail End -->

@endsection
