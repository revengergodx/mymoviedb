@extends('layouts.main')

@section('content')
    @guest()
        <div class="container">
            <p>To use service you need to register/login :)</p>
        </div>
    @endguest
    @auth()
        <div class="container">
            <!-- Small Box (Stat card) -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ auth()->user()->watchedMovies->count() }}</h3>
                            <p>Movies watched</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <a href="{{ route('watched.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ auth()->user()->wishlistedMovies->count() }}</h3>

                            <p>Movies wishlisted</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <a href="{{ route('wishlist.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    @endauth
@endsection
