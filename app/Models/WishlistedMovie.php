<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistedMovie extends Model
{
    use HasFactory;

    protected $table = 'wishlisted_movie';
    protected $guarded = false;
}
