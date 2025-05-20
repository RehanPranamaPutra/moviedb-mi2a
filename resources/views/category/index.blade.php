@extends('layouts.main')
@section('navCategory','active')
@section('title','Category Movie')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">📚 List Category</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Add Category
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categorys as $no => $category)
                        <tr>
                            <td>{{ $no +1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('category.edit',$category->id) }}"
                                       class="btn btn-sm btn-warning"
                                       title="Edit"
                                       data-bs-toggle="tooltip">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus"
                                                data-bs-toggle="tooltip"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Tidak ada data category</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{-- {{ $categorys->links() }} --}}
    </div>
</div>
@endsection
