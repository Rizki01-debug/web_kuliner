<link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('build/restoran/css/style.css') }}">
<!-- Bootstrap Bundle dengan Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
<a href="{{ route('home') }}" class="navbar-brand p-0">
    <h1 class="text-primary m-0">
        {{ $footer->title ?? 'KulinerCMS' }}
    </h1>
    <!-- Kalau pakai logo -->
    <!-- <img src="{{ asset('build/restoran/img/logo.png') }}" alt="Logo"> -->
</a>

        <!-- Burger Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <!-- pakai icon default Bootstrap -->
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about.index') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('services.index') }}" class="nav-item nav-link">Service</a>
                <a href="{{ route('menu.index') }}" class="nav-item nav-link">Menu</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->
