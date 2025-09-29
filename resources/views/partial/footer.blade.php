@php
    $footer = \App\Models\Footer::first();
@endphp

<div class="container-fluid bg-dark text-light footer pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4">{{ $footer->title ?? 'KulinerCMS' }}</h4>
                <p>{{ $footer->description ?? '' }}</p>
                <p><i class="fa fa-map-marker-alt me-2"></i>{{ $footer->address ?? '' }}</p>
                <p><i class="fa fa-phone-alt me-2"></i>{{ $footer->phone ?? '' }}</p>
                <p><i class="fa fa-envelope me-2"></i>{{ $footer->email ?? '' }}</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4">Jam Operasional</h4>
                <p>{{ $footer->open_hours ?? '' }}</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-4">Ikuti Kami</h4>
                <div class="d-flex pt-3">
                    @if($footer?->facebook)<a href="{{ $footer->facebook }}" class="btn btn-outline-light btn-social"><i class="fab fa-facebook-f"></i></a>@endif
                    @if($footer?->instagram)<a href="{{ $footer->instagram }}" class="btn btn-outline-light btn-social"><i class="fab fa-instagram"></i></a>@endif
                    @if($footer?->twitter)<a href="{{ $footer->twitter }}" class="btn btn-outline-light btn-social"><i class="fab fa-twitter"></i></a>@endif
                    @if($footer?->linkedin)<a href="{{ $footer->linkedin }}" class="btn btn-outline-light btn-social"><i class="fab fa-linkedin-in"></i></a>@endif
                </div>
            </div>
        </div>
    </div>
</div>
