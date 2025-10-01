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

<div class="row">
  <div class="col-md-6">
    @if($menu->image)
      <img src="{{ asset('storage/' . $menu->image) }}" class="img-fluid" alt="">
    @endif
  </div>
  <div class="col-md-6">
    <h1>{{ $menu->title }}</h1>
    <p>{{ $menu->description }}</p>
    <h4>Rp {{ number_format($menu->price,0,',','.') }}</h4>
    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
  </div>
</div>
@endsection
