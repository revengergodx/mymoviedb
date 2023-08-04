<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\StoreRequest;
use App\Http\Requests\Movie\UpdateRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class AdminMovieController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        return view('admin.movie.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image'], );
        $imageName = explode('/', $data['main_image']);
        $data['main_image'] = $imageName[1];

        Movie::firstOrCreate($data);
        return redirect()->route('movie.index');
    }

    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('admin.movie.edit', compact('movie', 'categories'));
    }

    public function update(Movie $movie, UpdateRequest $request)
    {
        $data = $request->validated();
        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }

        $imageName = explode('/', $data['main_image']);
        $data['main_image'] = $imageName[1];

        $movie->update($data);

        return redirect()->route('movie.index');
    }

    public function delete(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movie.index');
    }
}
