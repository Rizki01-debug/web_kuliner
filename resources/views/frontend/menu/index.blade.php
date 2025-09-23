@extends('layouts.frontend')

@section('title','Daftar Menu')

@section('content')
<div class="row">
  @foreach($menus as $menu)
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      @if($menu->image)
        <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" alt="">
      @endif
      <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $menu->title }}</h5>
        <p class="card-text text-truncate">{{ $menu->description }}</p>
        <p class="mt-auto"><strong>Rp {{ number_format($menu->price,0,',','.') }}</strong></p>
        <a href="{{ route('menu.show', $menu) }}" class="btn btn-primary">Lihat</a>
      </div>
    </div>
  </div>
  @endforeach
</div>

{{ $menus->links() }}
@endsection
