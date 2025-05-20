@extends('layouts.main')
@section('title','Movie')
@section('content')

<style>
    body {
        background-color: #1c1c1c;
        color: #f5f5f5;
    }
    .btn-primary {
        background-color: #ffc107;
        border: none;
        color: #000;
        font-weight: bold;
    }
    .btn-warning {
        background-color: #ffca2c;
        border: none;
        color: #000;
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

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-warning">🎞️ Movie List</h1>
        <a href="{{ route('movie.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Add Movie
        </a>
    </div>
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-lg-6 mb-4"> {{-- Tambahkan mb-4 untuk memberi jarak antar card --}}
                    <div class="card flex-md-row shadow-sm h-100">
                        {{-- Gambar --}}
                        @if($movie->cover_image)
                            <img src="{{ $movie->cover_image }}"
                                 class="img-fluid rounded-start"
                                 alt="{{ $movie->title }}"
                                 style="width: 200px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="width: 200px; height: 100%;">
                                <span>No Image</span>
                            </div>
                        @endif

                        {{-- Isi konten --}}
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">{{ Str::words($movie->synopsis,20, '...') }}</p>
                                <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}" class="btn btn-success">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 text-center">
            {{ $movies->links() }}
        </div>

</div>
@endsection
