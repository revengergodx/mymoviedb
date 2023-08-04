@extends('layouts.main')
@section('content')
    <div class="container">
        <!-- /.row -->
        <div class="row">
            <div class="d-flex">
                <div class="col-auto"><img class="mb-4" style="width: 200px; height: 300px"
                                           src="{{ asset('storage/images/' . $movie->main_image) }}">
                    <div class="d-flex justify-content-center">
                        <form method="post"
                              action="{{ route('movie.watched', $movie->id) }}">@csrf
                            <button
                                title="{{ auth()->user()->watchedMovies->contains($movie->id) ? 'Remove from watched' : 'Move to watched' }}"
                                type="submit" class="text-primary  border-0 bg-transparent"><i
                                    class="fa{{auth()->user()->watchedMovies->contains($movie->id) ? 's' : 'r'}} fa-regular fa-eye fa-lg mr-4"></i>
                            </button>
                        </form>
                        <form method="post"
                              action="{{ route('movie.wishlisted', $movie->id) }}">@csrf
                            <button
                                title="{{ auth()->user()->wishlistedMovies->contains($movie->id) ? 'Remove from wishlist' : 'Move to wishlist' }}"
                                type="submit" class="text-primary border-0 bg-transparent"><i
                                    class="fa{{auth()->user()->wishlistedMovies->contains($movie->id) ? 's' : 'r'}} fa-regular fa-star fa-lg"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" col">
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <div class="text-xl text-bold ">
                        {{ $movie->name }}
                    </div>
                    <div class="text-xl text-bold">
                        ({{ $movie->year }})
                    </div>
                </div>
                <div>
                    <div class="d-flex text-lg">
                        Genre: &nbsp
                        <p>
                            {{ $movie->categories->title }}
                        </p>
                    </div>
                </div>
                <div class="pl-3 pr-3 pt-1 border bg-gray-light">
                    <p>
                        {{ $movie->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
