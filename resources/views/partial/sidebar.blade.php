<head>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('build/restoran/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">

  <style>
    body {
      font-family: 'Segoe UI', system-ui, sans-serif;
      background-color: #f8f9fa;
      overflow-x: hidden;
    }

    .sidebar {
      background: #1a1d28;
      color: #fff;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      box-shadow: 3px 0 10px rgba(0,0,0,0.1);
      width: 280px;
      transition: transform 0.3s ease;
    }

    .sidebar-brand {
      padding: 1.5rem 1rem;
      border-bottom: 1px solid #2a2f3d;
      font-weight: 600;
      font-size: 1.25rem;
    }

    .sidebar-brand i {
      color: #0d6efd;
      margin-right: 10px;
    }

    .nav-link {
      color: #adb5bd;
      padding: 0.75rem 1.5rem;
      margin: 0.15rem 0.5rem;
      border-radius: 0.5rem;
      transition: all 0.2s;
    }

    .nav-link:hover, .nav-link.active {
      background-color: #2a2f3d;
      color: #fff;
    }

    .nav-link.active {
      color: #0d6efd;
      border-left: 3px solid #0d6efd;
    }

    .nav-link i {
      width: 20px;
      margin-right: 10px;
      text-align: center;
    }

    /* Dropdown khusus sidebar */
    .sidebar .dropdown-menu {
      background-color: #151821;
      border: none;
      border-radius: 0.5rem;
      margin: 0.25rem 0.5rem;
      padding: 0.5rem 0;
      position: relative;
      display: none; /* hidden default */
    }

    .sidebar .dropdown-menu.show {
      display: block; /* muncul ketika toggle */
    }

    .dropdown-item {
      color: #adb5bd;
      padding: 0.5rem 1.5rem 0.5rem 3rem;
    }

    .dropdown-item:hover, .dropdown-item.active {
      background-color: #2a2f3d;
      color: #fff;
    }

    .sidebar-footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      padding: 1rem;
      border-top: 1px solid #2a2f3d;
    }

    .main-content {
      margin-left: 280px;
      padding: 2rem;
      transition: margin-left 0.3s ease;
    }

    /* Mobile toggle button */
    .sidebar-toggle {
      display: none;
      position: fixed;
      top: 1rem;
      left: 1rem;
      z-index: 1100;
      background: #1a1d28;
      border: none;
      color: white;
      border-radius: 0.5rem;
      padding: 0.5rem 0.75rem;
    }

    /* Responsive styles */
    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .main-content {
        margin-left: 0 !important;
      }

      .sidebar-toggle {
        display: block;
      }
    }
  </style>
</head>

<body>
  <!-- Sidebar Toggle Button (Mobile) -->
  <button class="sidebar-toggle d-lg-none" id="sidebarToggle">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <nav class="sidebar" id="sidebar">
    <div class="sidebar-brand d-flex align-items-center">
      <i class="fas fa-utensils me-2"></i>
      KulinerCMS Backoffice
    </div>

    <ul class="nav flex-column sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('backoffice.dashboard') ? 'active' : '' }}" 
           href="{{ route('backoffice.dashboard') }}">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('backoffice.users.*') ? 'active' : '' }}" 
           href="{{ route('backoffice.users.index') }}">
          <i class="fas fa-users"></i> Users
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('backoffice.menus.*') ? 'active' : '' }}" 
           href="{{ route('backoffice.menus.index') }}">
          <i class="fas fa-utensils"></i> Menus
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="contentDropdown" role="button" 
           data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-file-alt"></i> Content
        </a>
        <ul class="dropdown-menu" aria-labelledby="contentDropdown">
          <li><a class="dropdown-item" href="{{ route('backoffice.footer.index') }}">Footer</a></li>
          <li><a class="dropdown-item" href="{{ route('backoffice.about.index') }}">About</a></li>
          <li><a class="dropdown-item" href="{{ route('backoffice.services.index') }}">Services</a></li>
          <li><a class="dropdown-item" href="{{ route('backoffice.newsletter.index') }}">Newsletter</a></li>
        </ul>
      </li>
    </ul>

    <div class="sidebar-footer">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-light w-100" type="submit">
          <i class="fas fa-sign-out-alt me-2"></i>Logout
        </button>
      </form>
    </div>
  </nav>


</body>

  <!-- Bootstrap Bundle JS (wajib di bawah body) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toggleBtn = document.getElementById("sidebarToggle");
      const sidebar = document.getElementById("sidebar");

      toggleBtn.addEventListener("click", function() {
        sidebar.classList.toggle("show");
      });
    });
  </script>
