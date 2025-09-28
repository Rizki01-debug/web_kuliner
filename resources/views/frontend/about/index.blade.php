@extends('layouts.app2')

@section('title', 'About Us')

@section('content')
    <!-- Hero Start -->
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 py-5">
            <h1 class="display-3 text-white animated slideInDown">About Us</h1>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    @if($about && $about->image)
                        <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.1s" 
                             src="{{ asset('storage/'.$about->image) }}" alt="{{ $about->title }}">
                    @else
                        <img class="img-fluid rounded" src="{{ asset('restoran/img/about.jpg') }}" alt="About">
                    @endif
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">{{ $about->title ?? 'Tentang Kami' }}</h1>
                    <p class="mb-4">{{ $about->description ?? 'Belum ada deskripsi.' }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
