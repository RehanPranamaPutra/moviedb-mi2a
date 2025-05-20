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
    </style>
</head>

<body class="d-flex flex-column h-100">
    @include('layouts.header')

    <main class="flex-shrink-0">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <div class="bg-success text-white text-center">
        Copyright &copy; 2025 - Manajemen Informatika 2A
    </div>

    <!-- Bootstrap 5 JS Bundle CDN (sudah termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
