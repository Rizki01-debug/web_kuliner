@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <h1>Dashboard</h1>
    <p>Selamat datang di dashboard!</p>

    <div class="row mt-4">
        <!-- Total Menu -->
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Menu</h5>
                    <p class="card-text display-6">{{ $menuCount }}</p>
                </div>
            </div>
        </div>

        <!-- Total Newsletter -->
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Newsletter</h5>
                    <p class="card-text display-6">{{ $newsletterCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
