@extends('layouts.main')

@section('content')
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div >
                        <form
                            action="{{ route('admin.movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Movie title</label>
                                <input type="text" class="form-control" name="name" placeholder="Movie title"
                                       value="{{ $movie->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Movie Description</label>
                                <textarea style="width: 350px" type="text" class="form-control" name="description"
                                          placeholder="Description">{{ $movie->description}}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Year of release</label>
                                <input type="text" class="form-control" name="year" placeholder="Year of release"
                                       value="{{ $movie->year}}">
                                @error('year')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div>
                                        <div class="form-group">
                                            <label>Select category</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $movie->category_id ? 'selected' : '' }}>{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <div><p class="mb-0">Current Image:</p><img class="mb-3" style="width:150px; height: 150px" src="{{ asset('storage/images/'. $movie->main_image) }}"></div>
                                    <label for="exampleInputFile">Choose poster for the movie to update</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image"
                                                   id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Edit"
                                       class="btn btn-block btn-info w-25">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
