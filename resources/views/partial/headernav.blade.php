<link rel="stylesheet" href="{{ asset('restoran/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('restoran/css/style.css') }}">
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

        <!-- Toggler untuk mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about.index') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('services.index') }}" class="nav-item nav-link">Services</a>
                <a href="{{ route('menu.index') }}" class="nav-item nav-link">Menu</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">
                        Selamat Datang di <br>Aplikasi Kuliner
                    </h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">
                        Eksplor menu favoritmu di sini 🍽️
                    </p>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="{{ asset('build/restoran/img/nasi-goreng.png') }}" alt="Hero">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- Tambahkan ini sebelum </body> -->
<script src="{{ asset('restoran/js/bootstrap.bundle.min.js') }}"></script>
