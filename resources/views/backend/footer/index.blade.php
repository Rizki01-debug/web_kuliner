@extends('layouts.backend')

@section('title', 'Management Footer')

@section('content')
<div class="container">
    <h1 class="mb-4">Management Footer</h1>
    @if ($footer)
        <a href="{{ route('backoffice.footer.edit', $footer->id) }}" class="btn btn-warning mb-3">Edit Footer</a>
        <table class="table table-bordered">
            <tr><th>Title</th><td>{{ $footer->title }}</td></tr>
            <tr><th>Description</th><td>{{ $footer->description }}</td></tr>
            <tr><th>Address</th><td>{{ $footer->address }}</td></tr>
            <tr><th>Phone</th><td>{{ $footer->phone }}</td></tr>
            <tr><th>Email</th><td>{{ $footer->email }}</td></tr>
            <tr><th>Open Hours</th><td>{{ $footer->open_hours }}</td></tr>
            <tr><th>Facebook</th><td>{{ $footer->facebook }}</td></tr>
            <tr><th>Instagram</th><td>{{ $footer->instagram }}</td></tr>
            <tr><th>Twitter</th><td>{{ $footer->twitter }}</td></tr>
            <tr><th>LinkedIn</th><td>{{ $footer->linkedin }}</td></tr>
        </table>
    @else
<a href="{{ route('backoffice.footer.create') }}" class="btn btn-primary">Tambah Footer</a>
    @endif
</div>
@endsection
