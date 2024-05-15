<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        $isbn = $this->faker->isbn10();
        $author = Author::all()->random();
        $author_id = $author->id;
        $genre = $author->genre->id;
        
        return [
            'title' => $title,
            'isbn'=> $isbn,
            'genre_id'=> $genre,
            'author_id'=> $author_id
        ];
    }
}
