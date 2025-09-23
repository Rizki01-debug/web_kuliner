@extends('layouts.backend')

@section('title','Detail Menu')

@section('content')
<h2>{{ $menu->title }}</h2>
@if($menu->image)
  <img src="{{ asset('storage/' . $menu->image) }}" alt="" style="max-width:300px;">
@endif
<p>{{ $menu->description }}</p>
<p>Harga: Rp {{ number_format($menu->price,0,',','.') }}</p>
<p>Published: {{ $menu->is_published ? 'Yes' : 'No' }}</p>

<a href="{{ route('backoffice.menus.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
