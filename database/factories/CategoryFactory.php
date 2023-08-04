<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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

        ];
    }
}
