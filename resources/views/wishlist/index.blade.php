@extends('layouts.main')

@section('content')
    <div class="container">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Your wishlisted movies</h3>

                        <div class="card-tools d-flex justify-content-between">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form method="get" action="{{ route('search.wishlist') }}">
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
                    <div class="card-body table-responsive p-0">
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
                            <tbody>
                            @foreach($wishlistedMovies as $movie)
                                <tr>
                                    <td class="text-wrap"><a href="{{ route('movie.show', $movie->id) }}">{{ $movie->name }}</a></td>
                                    <td class="text-wrap">{{ \Illuminate\Support\Str::limit($movie->description, 50, '...') }}</td>
                                    <td><img style="width:90px; height: 85px" src="{{asset('storage/images/'.$movie->main_image)}}"></td>
                                    <td>{{ $movie->year }}</td>
                                    <td class="d-flex">
                                        <form method="post"
                                              action="{{ route('movie.wishlisted', $movie->id) }}">@csrf
                                            <button title="Remove from wishlist" type="submit" class="text-primary border-0 bg-transparent"><i
                                                    class="fa{{auth()->user()->wishlistedMovies->contains($movie->id) ? 's' : 'r'}} fa-regular fa-star"></i></button>
                                        </form></td>
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
            {{ $wishlistedMovies->links() }}
        </div>
    </div>
@endsection
