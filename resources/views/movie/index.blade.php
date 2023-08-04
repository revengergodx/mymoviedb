@extends('layouts.main')
@section('content')
    <div class="container">
        <!-- /.row -->
        @if(!auth()->guest())
            @if(auth()->user()->role === 0)
                <div>
                    <a href="{{ route('admin.movie.create') }}" class="btn btn-primary mb-4">Add movie</a>
                </div>
            @endif
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Movies</h3>

                        <div class="card-tools d-flex justify-content-between">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form method="get" action="{{ route('movies.search') }}">
                                    <div class="input-group-append">
                                        <input type="text" name="table_search" class="form-control float-right"
                                               placeholder="Search">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="d-flex card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th width="20%">Movie</th>
                                <th width="35%">Description</th>
                                <th>Image</th>
                                <th>Year</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($movies as $movie)
                                <tr>
                                    <td class="text-wrap"><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->name }}</a></td>
                                    <td class="text-wrap">{{ \Illuminate\Support\Str::limit($movie->description, 120, '..') }}</td>
                                    <td><img style="width:90px; height: 85px"
                                             src="{{ asset('/storage/images/'.$movie->main_image)}}"></td>
                                    <td>{{ $movie->year }}</td>
                                    @auth
                                        <td class="d-flex">
                                            <form method="post"
                                                  action="{{ route('movie.watched', $movie->id) }}">@csrf
                                                <button title="{{ auth()->user()->watchedMovies->contains($movie->id) ? 'Remove from watched' : 'Move to watched' }}" type="submit" class="text-primary border-0 bg-transparent"><i
                                                        class="fa{{auth()->user()->watchedMovies->contains($movie->id) ? 's' : 'r'}} fa-regular fa-eye"></i></button>
                                            </form>
                                            <form method="post"
                                                  action="{{ route('movie.wishlisted', $movie->id) }}">@csrf
                                                <button title="{{ auth()->user()->wishlistedMovies->contains($movie->id) ? 'Remove from wishlist' : 'Move to wishlist' }}" type="submit" class="text-primary border-0 bg-transparent"><i
                                                        class="fa{{auth()->user()->wishlistedMovies->contains($movie->id) ? 's' : 'r'}} fa-regular fa-star"></i></button>
                                            </form>
                                            @if(!auth()->guest())
                                                @if(auth()->user()->role ===0)
                                                    <a href="{{ route('admin.movie.edit', $movie) }}"
                                                       class="text-success"><i
                                                            class="pl-3 fas fa-solid fa-pen"></i></a>
                                                    <form method="post"
                                                          action="{{ route('admin.movie.delete', $movie->id) }}">@csrf @method('delete')
                                                        <button type="submit"
                                                                class="text-danger border-0 bg-transparent"><i
                                                                class="pl-3 fas fa-solid fa-trash"></i></button>
                                                    </form>
                                                @endif
                                            @endif</td>
                                    @endauth
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        <div class="d-flex justify-content-center">
            {{ $movies->links() }}
        </div>
    </div>

@endsection
