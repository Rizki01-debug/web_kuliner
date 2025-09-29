@extends('layouts.app2')

@section('title', 'About Us')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-dark hero-header mb-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 text-center">
                    <h1 class="display-4 text-white mb-4 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">

            @php
                // Jika suatu saat $abouts ada banyak data, kita buat posisi photo/text bergantian
                $sections = is_iterable($about) ? $about : [$about];
            @endphp

            @foreach($sections as $index => $section)
                <div class="row g-5 align-items-center mb-5 flex-lg-row{{ $index % 2 ? '-reverse' : '' }}">
                    <!-- Image -->
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        @if($section && $section->image)
                            <img class="img-fluid rounded-3 shadow-lg"
                                 src="{{ asset('storage/'.$section->image) }}"
                                 alt="{{ $section->title }}"
                                 style="max-height: 500px; width: 100%; object-fit: cover;">
                        @else
                            <img class="img-fluid rounded-3 shadow-lg"
                                 src="{{ asset('build/restoran/img/about-1.jpg') }}"
                                 alt="Default About"
                                 style="max-height: 500px; width: 100%; object-fit: cover;">
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="section-title mb-4">
                            <h1 class="display-6 fw-bold text-primary">
                                {{ $section->title ?? 'Tentang Kami' }}
                            </h1>
                        </div>
                        <p class="mb-4 text-secondary fs-5 lh-lg">
                            {{ $section->description ?? 'Belum ada deskripsi.' }}
                        </p>
                        @if(!empty($section->button_link))
                            <a href="{{ $section->button_link }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                                {{ $section->button_text ?? 'Selengkapnya' }}
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- About End -->
@endsection
