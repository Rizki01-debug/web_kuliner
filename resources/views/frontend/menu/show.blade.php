@extends('layouts.app2')

@section('title', $menu->title)

@section('content')
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
