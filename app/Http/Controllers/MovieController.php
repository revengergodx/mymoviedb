<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\SearchRequest;
use App\Http\Requests\Movie\StoreRequest;
use App\Http\Requests\Movie\UpdateRequest;
use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('movie.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    public function watched(Movie $movie)
    {
        auth()->user()->watchedMovies()->toggle($movie->id);
        return redirect()->back();
    }

    public function wishlist(Movie $movie)
    {
        auth()->user()->wishlistedMovies()->toggle($movie->id);
        return redirect()->back();
    }

    public function watchedPage()
    {
        if (!auth()->guest()) {
            $user_id = auth()->user()->id;
            $watchedMovies = User::find($user_id)->watchedMovies()->paginate(10);
            return view('watched.index', compact('watchedMovies'));
        } else {
            return view('home');
        }
    }

    public function wishlistedPage()
    {
        if (!auth()->guest()) {
            $user_id = auth()->user()->id;
            $wishlistedMovies = User::find($user_id)->wishlistedMovies()->paginate(10);
            return view('wishlist.index', compact('wishlistedMovies'));
        } else {
            return view('home');
        }
    }

    public function search(SearchRequest $request)
    {
        $search = $request->validated();
        $searchUpper = Str::ucfirst($search['table_search']);
        $movies = Movie::where('name', 'LIKE', "%{$search['table_search']}%")->orWhere('name', 'LIKE',
            "{$search['table_search']}%")->orWhere('name', 'LIKE', "{$searchUpper}%")->orWhere('name', 'LIKE', "%{$searchUpper}%")->paginate(10);
        return view('movie.index', compact('movies'));

    }

    public function searchWatched(SearchRequest $request)
    {
        $search = $request->validated();
        $searchUpper = Str::ucfirst($search['table_search']);
        $user_id = auth()->user()->id;
        $watchedMovies = User::find($user_id)->watchedMovies()->where('name', 'LIKE',
            "%{$search['table_search']}%")->orWhere('name', 'LIKE',
            "{$search['table_search']}%")->orWhere('name', 'LIKE', "{$searchUpper}%")->orWhere('name', 'LIKE', "%{$searchUpper}%")->paginate(10);
        return view('watched.index', compact('watchedMovies'));

    }

    public function searchWishlist(SearchRequest $request)
    {
        $search = $request->validated();
        $searchUpper = Str::ucfirst($search['table_search']);
        $user_id = auth()->user()->id;
        $wishlistedMovies = User::find($user_id)->watchedMovies()->where('name', 'LIKE', "%{$search['table_search']}%")->orWhere('name', 'LIKE',
            "{$search['table_search']}%")->orWhere('name', 'LIKE', "{$searchUpper}%")->orWhere('name', 'LIKE', "%{$searchUpper}%")->paginate(10);
        return view('wishlist.index', compact('wishlistedMovies'));
    }
}
