@php
    $footer = \App\Models\Footer::first();
@endphp

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            
            <!-- Contact Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Kontak</h4>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>{{ $footer->address ?? '' }}
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt me-3"></i>{{ $footer->phone ?? '' }}
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope me-3"></i>{{ $footer->email ?? '' }}
                </p>
                <div class="d-flex pt-2">
                    @if($footer?->twitter)
                        <a class="btn btn-outline-light btn-social" href="{{ $footer->twitter }}">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                    @if($footer?->facebook)
                        <a class="btn btn-outline-light btn-social" href="{{ $footer->facebook }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif
                    @if($footer?->instagram)
                        <a class="btn btn-outline-light btn-social" href="{{ $footer->instagram }}">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    @if($footer?->linkedin)
                        <a class="btn btn-outline-light btn-social" href="{{ $footer->linkedin }}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Opening Hours Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Jam Operasional</h4>
                <p class="mb-2">{{ $footer->open_hours ?? '' }}</p>
            </div>

            <!-- Newsletter Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                <p>Dapatkan info terbaru dari {{ $footer->title ?? 'KulinerCMS' }}.</p>
                <div class="input-group" style="max-width: 400px;">
                    <input 
                        type="text" 
                        class="form-control border-primary py-3 ps-4" 
                        placeholder="Masukkan email anda"
                    >
                    <button 
                        type="button" 
                        class="btn btn-primary px-4"
                    >
                        Daftar
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Copyright Section -->
    <div class="container">
        <div class="copyright">
            <div class="row">

                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; 
                    <a class="border-bottom" href="#">
                        {{ $footer->title ?? 'KulinerCMS' }}
                    </a>, All Right Reserved.
                    <br>
                    Designed By 
                    <a class="border-bottom" href="https://htmlcodex.com">Muhammad Rizki Subagja</a>
                    <br>
                    Distributed By 
                    <a class="border-bottom" href="https://themewagon.com" target="_blank">IT genic</a>
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Footer End -->