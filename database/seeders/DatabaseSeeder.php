<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'title' => 'Action'
            ],
            [
                'title' => 'Comedy'
            ],
            [
                'title' => 'Drama'
            ],
            [
                'title' => 'Fantasy'
            ],
            [
                'title' => 'Horror'
            ],
            [
                'title' => 'Mystery'
            ],
            [
                'title' => 'Romance'
            ],
            [
                'title' => 'Thriller'
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin',
                'password' => Hash::make('password'),
                'role' => 0
            ],
            [
                'name' => 'user',
                'email' => 'user@user',
                'password' => Hash::make('password'),
                'role' => 1
            ],
        ]);

        Movie::factory(20)->create();
    }
}
