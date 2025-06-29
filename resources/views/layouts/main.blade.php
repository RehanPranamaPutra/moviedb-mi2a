<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Movie')</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon Libraries -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
          rel="stylesheet">

    @stack('styles')
    <style>
        main>.container {
            padding: 60px 15px 0;
        }
        body {
        background-color: #3a3a3a;
        color: #f5f5f5;
    }
    .btn-primary {
        background-color: #ffc107;
        border: none;

        font-weight: bold;
    }
    .btn-warning {
        background-color: #ffca2c;
        border: none;

    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
    }
    .card {
        background-color: #2c2c2c;
        border: none;
        color: #fff;
    }
    .card-title {
        color: #ffc107;
    }
    .card-text {
        color: #ccc;
    }
    .alert-info {
        background-color: #343a40;
        border-color: #ffc107;
        color: #ffc107;
    }
    </style>
</head>

<body class="d-flex flex-column h-100">
    @include('layouts.header')

    <main class="flex-shrink-0">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
         <div class="bg-success text-white text-center">
        Copyright &copy; 2025 - Manajemen Informatika 2A
    </div>
    </footer>


    <!-- Bootstrap 5 JS Bundle CDN (sudah termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
