<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('admin')->as('admin.')->group(function () {
    Route::controller(AdminMovieController::class)->prefix('movies')->as('movie.')->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/{movie}/edit', 'edit')->name('edit');
        Route::PATCH('/{movie}', 'update')->name('update');
        Route::delete('/{movie}', 'delete')->name('delete');
    });
});

Route::controller(MovieController::class)->group(function () {
    Route::get('/movies', 'index')->name('movie.index');
    Route::post('{movie}/watched', 'watched')->name('movie.watched');
    Route::post('{movie}/wishlisted', 'wishlist')->name('movie.wishlisted');
    Route::get('/watched', 'watchedPage')->name('watched.index');
    Route::get('/wishlisted', 'wishlistedPage')->name('wishlist.index');
    Route::get('/movies/search', 'search')->name('movies.search');
    Route::get('/watched/search', 'searchWatched')->name('search.watched');
    Route::get('/wishlisted/search', 'searchWishlist')->name('search.wishlist');
    Route::get('/{movie}/show', 'show')->name('movie.show');
});

Route::get('/', function () {
    return view('home');
})->name('home');



Auth::routes();
