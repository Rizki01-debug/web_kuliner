@extends('layouts.app2')

@section('title', 'Services')

@section('content')

    <div class="container-fluid bg-dark hero-header mb-5">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 text-center">
                    <h1 class="display-4 text-white mb-4 animated slideInDown">Services</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Our Services</h1>

    <div class="grid md:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
<td>
    @if ($service->icon)
        <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}" width="60">
    @else
        <span class="text-muted">No Icon</span>
    @endif
</td>

                <h2 class="text-xl font-semibold mb-2">{{ $service->title }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 100) }}</p>

                <a href="{{ route('services.show', $service) }}" 
                   class="text-blue-600 font-semibold hover:underline">
                   Read More →
                </a>
            </div>
        @empty
            <p class="text-gray-500">No services available.</p>
        @endforelse
    </div>
</div>
@endsection
