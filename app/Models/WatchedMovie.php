<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedMovie extends Model
{
    use HasFactory;

    protected $table = 'watched_movies';
    protected $guarded = false;
}
