@extends('layouts.main')
@section('title','Edit Movie')
@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-6 text-warning">✏️ Edit Movie</h1>
    </div>
    <div class="card shadow-lg mx-auto" style="max-width: 700px;">
        <div class="card-body">
            <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Movie Title</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $movie->title) }}"
                           placeholder="e.g. The Matrix">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Synopsis --}}
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Synopsis</label>
                    <textarea name="synopsis"
                              class="form-control @error('synopsis') is-invalid @enderror"
                              rows="4"
                              placeholder="Brief description of the movie...">{{ old('synopsis', $movie->synopsis) }}</textarea>
                    @error('synopsis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Category --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Year --}}
                <div class="mb-3">
                    <label for="year" class="form-label">Release Year</label>
                    <input type="number"
                           name="year"
                           class="form-control @error('year') is-invalid @enderror"
                           value="{{ old('year', $movie->year) }}"
                           placeholder="e.g. 2024">
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Actors --}}
                <div class="mb-3">
                    <label for="actors" class="form-label">Actor(s)</label>
                    <input type="text"
                           name="actors"
                           class="form-control @error('actors') is-invalid @enderror"
                           value="{{ old('actors', $movie->actors) }}"
                           placeholder="e.g. Robert Downey Jr, Emma Stone">
                    @error('actors')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Cover Image --}}
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <input type="file"
                           name="cover_image"
                           accept="image/*"
                           class="form-control @error('cover_image') is-invalid @enderror">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($movie->cover_image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/'.$movie->cover_image) }}" width="120">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save"></i> Update Movie
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
