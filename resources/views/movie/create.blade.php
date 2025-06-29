@extends('layouts.main')
@section('title', 'Add Movie')
@section('content')

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-6 text-warning fw-bold">🎬 Add New Movie</h1>
        <p class="text-muted">Fill in the details to list a new movie</p>
    </div>
    <div class="mb-3">
        <a href="{{ route('movie.data') }}"
           class="btn btn-secondary d-inline-flex align-items-center gap-2 px-4 py-2 rounded-3 shadow-sm">
           <i class="bi bi-film"></i> Lihat Data Movie
        </a>
    </div>

    <div class="card shadow-lg mx-auto border-0" style="max-width: 700px; background: #232323;">
        <div class="card-body p-4">
            <form action="{{ route('movie.add') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Movie Title</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}"
                           placeholder="e.g. The Matrix">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Synopsis --}}
                <div class="mb-3">
                    <label for="synopsis" class="form-label fw-semibold">Synopsis</label>
                    <textarea name="synopsis"
                              class="form-control @error('synopsis') is-invalid @enderror"
                              rows="4"
                              placeholder="Brief description of the movie...">{{ old('synopsis') }}</textarea>
                    @error('synopsis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label fw-semibold">Category</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                    <label for="year" class="form-label fw-semibold">Release Year</label>
                    <input type="number"
                           name="year"
                           class="form-control @error('year') is-invalid @enderror"
                           value="{{ old('year') }}"
                           placeholder="e.g. 2024" min="1900" max="{{ date('Y') }}">
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Actors --}}
                <div class="mb-3">
                    <label for="actors" class="form-label fw-semibold">Actor(s)</label>
                    <input type="text"
                           name="actors"
                           class="form-control @error('actors') is-invalid @enderror"
                           value="{{ old('actors') }}"
                           placeholder="e.g. Robert Downey Jr, Emma Stone">
                    @error('actors')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Cover Image --}}
                <div class="mb-4">
                    <label for="cover_image" class="form-label fw-semibold">Cover Image</label>
                    <input type="file"
                           name="cover_image"
                           accept="image/*"
                           class="form-control @error('cover_image') is-invalid @enderror"
                           onchange="previewImage(event)">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="mt-3 text-center">
                        <img id="imagePreview" src="#" alt="Image Preview" class="img-thumbnail d-none" style="max-height: 250px; background: #222;">
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary w-100 py-2 fs-5 shadow">
                    <i class="fas fa-save"></i> Save Movie
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection
