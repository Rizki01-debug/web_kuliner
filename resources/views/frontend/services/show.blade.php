@extends('layouts.app2')

@section('title', $service->title)

@section('content')

    <div class="container-fluid bg-dark hero-header mb-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 text-center">
                    <h1 class="display-4 text-white mb-4 animated slideInDown">Service</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

<div class="container mx-auto px-4 py-10">
    <div class="bg-white shadow rounded-lg p-6">
<td>
    @if ($service->icon)
        <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}" width="60">
    @else
        <span class="text-muted">No Icon</span>
    @endif
</td>

        <h1 class="text-3xl font-bold mb-4">{{ $service->title }}</h1>
        <p class="text-gray-700 leading-relaxed">{{ $service->description }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('services.index') }}" class="text-blue-600 hover:underline">← Back to Services</a>
    </div>
</div>
@endsection
