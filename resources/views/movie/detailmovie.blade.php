@extends('layouts.main')
@section('content')
    <h1>Detail Movie</h1>
    <div class="col-lg-12 mb-4"> {{-- Tambahkan mb-4 untuk memberi jarak antar card --}}
                    <div class="card flex-md-row shadow-sm ">
                        {{-- Gambar --}}
                        @if($movie->cover_image)
                            <img src="{{ $movie->cover_image }}"
                                 class="img-fluid rounded-start"
                                 alt="{{ $movie->title }}"
                                 >
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-secondary text-white" style="width: 200px; height: 100%;">
                                <span>No Image</span>
                            </div>
                        @endif

                        {{-- Isi konten --}}
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">Synopsis :</p>
                                <p class="card-text">{{$movie->synopsis }}</p>
                                <p class="card-text">Year :{{$movie->year }}</p>
                                <p class="card-text">Category : {{$movie->category->category_name }}</p>
                                <p class="card-text">Actors :{{$movie->actors }}</p>
                                <a href="/" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
