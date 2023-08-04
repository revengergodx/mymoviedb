<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'movies';
    protected $guarded = false;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function watchedUsers()
    {
        return $this->belongsToMany(User::class, 'watched_movies', 'movie_id', 'user_id');
    }
    public function wishlistedUser()
    {
        return $this->belongsToMany(User::class, 'wishlisted_movies', 'movie_id', 'user_id');
    }
}
