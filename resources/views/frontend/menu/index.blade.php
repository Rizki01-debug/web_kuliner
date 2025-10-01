@extends('layouts.app2')

@section('title','Daftar Menu')

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

<style>
  /* Biar deskripsi rapi, max 2 baris */
  .text-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 2; 
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .card:hover {
    transform: translateY(-5px);
    transition: 0.3s;
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
  }
</style>

<div class="container py-4">
  <div class="row g-4">
    @foreach($menus as $menu)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm rounded-3">
        @if($menu->image)
          <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top rounded-top" alt="Gambar {{ $menu->title }}">
        @else
          <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top rounded-top" alt="No image">
        @endif
        <div class="card-body d-flex flex-column">
          <h5 class="card-title fw-bold text-primary">{{ $menu->title }}</h5>
          <p class="card-text text-muted text-clamp">{{ $menu->description }}</p>
          <div class="mt-auto">
            <p class="fw-semibold mb-2 text-success">Rp {{ number_format($menu->price,0,',','.') }}</p>
            <a href="{{ route('menu.show', $menu) }}" class="btn btn-primary w-100">
              <i class="bi bi-eye"></i> Lihat Detail
            </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center mt-4">
    {{ $menus->links() }}
  </div>
</div>
@endsection
