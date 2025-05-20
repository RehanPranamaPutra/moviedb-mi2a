<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class MovieController extends Controller
{
    public function index(){
        $movies = Movie::with('category')->latest()->paginate(6);
        return view('movie.index',compact('movies'));
    }

    public function create(){
        $categorys = Category::all();
        return view('movie.create',compact('categorys'));
    }

    public function add(Request $request){

        $validate = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'synopsis' => 'required',
            'category_id' => 'required|exists:categorys,id',
            'year' => 'required',
            'actors' => 'required',
            'cover_image' => 'required'
        ]);

        $validate['slug'] = Str::slug($request->title);

        Movie::crete($validate);
        return redirect()->route('movie.index');
    }

    public function detail($id, $slug)
    {
        $movie = Movie::find($id);
        $category = Category::all();
        return view('movie.detailmovie',compact('movie','category'));
    }
}
