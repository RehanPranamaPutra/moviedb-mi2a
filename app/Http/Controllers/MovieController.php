<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('category')->latest()->paginate(6);
        return view('movie.index', compact('movies'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('movie.create', compact('categories'));
    }

    public function add(Request $request)
    {

        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1950|max:' . date('Y'),
            'actors' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,webp,jpeg'
        ]);

        $slug = Str::slug($request->title);
        $cover = null;
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
        }
        // simpan ke table

        Movie::create([
            'title' => $validate['title'],
            'slug' => $slug,
            'synopsis' => $validate['synopsis'],
            'category_id' => $validate['category_id'],
            'year' => $validate['year'],
            'actors' => $validate['actors'],
            'cover_image' => $cover,

        ]);
        return redirect()->route('movie.index')->with('success', 'MOvie saved successfuly');
    }

    public function data()
    {
        $movies = Movie::with('category')->get();
        return view('movie.data', compact('movies'));
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movie.edit', compact('movie', 'categories'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1950|max:' . date('Y'),
            'actors' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpg,webp,jpeg'
        ]);

        $slug = Str::slug($request->title);

        // Update cover jika ada file baru
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image')->store('covers', 'public');
            $movie->cover_image = $cover;
        }

        $movie->update([
            'title' => $validate['title'],
            'slug' => $slug,
            'synopsis' => $validate['synopsis'],
            'category_id' => $validate['category_id'],
            'year' => $validate['year'],
            'actors' => $validate['actors'],
            'cover_image' => $movie->cover_image,
        ]);

        return redirect()->route('movie.data')->with('success', 'Movie berhasil diupdate');
    }

    public function detail($id, $slug)
    {
        $movie = Movie::find($id);
        $category = Category::pluck('category_name');
        return view('movie.detailmovie', compact('movie', 'category'));
    }

    public function destroy(Movie $movie)
    {
        // Hapus cover jika ada
        if ($movie->cover_image && Storage::disk('public')->exists($movie->cover_image)) {
            Storage::disk('public')->delete($movie->cover_image);
        }
        $movie->delete();
        return redirect()->route('movie.data')->with('success', 'Movie berhasil dihapus');
    }
}
