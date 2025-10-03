<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Backoffice') - KulinerCMS</title>

        <link rel="stylesheet" href="{{ asset('build/restoran/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset(path: 'build/restoran/css/style.css') }}">
  <!-- Bootstrap CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
 @extends('partial.sidebar')

  <!-- Main Content -->
  <main class="main-content">
    <div class="page-header">
      <h1 class="h3 mb-0">@yield('page-title', 'Dashboard')</h1>
      <p class="text-muted mb-0">Welcome to KulinerCMS Backoffice</p>
    </div>
    
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @yield('content')
  </main>

  <!-- Bootstrap JS (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Toggle sidebar on mobile
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
      document.querySelector('.sidebar').classList.toggle('show');
    });
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
      const sidebar = document.querySelector('.sidebar');
      const toggle = document.querySelector('.sidebar-toggle');
      
      if (window.innerWidth < 992 && sidebar.classList.contains('show')) {
        if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
          sidebar.classList.remove('show');
        }
      }
    });
    
    // Update active state for dropdown items
    document.addEventListener('DOMContentLoaded', function() {
      const currentPath = window.location.pathname;
      document.querySelectorAll('.nav-link, .dropdown-item').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
          link.classList.add('active');
          // If it's in a dropdown, make sure the dropdown is expanded
          const dropdown = link.closest('.dropdown-menu');
          if (dropdown) {
            const parent = dropdown.previousElementSibling;
            parent.classList.add('active');
          }
        }
      });
    });
  </script>
</body>
</html>