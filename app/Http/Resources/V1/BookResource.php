<?php

namespace App\Http\Resources\V1;

use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $genre_info = $this->getGenreData();
        $author_info = $this->getAuthorData();

        return [
            "id"=> $this->id,
            "title"=> $this->title,
            "isbn"=> $this->isbn,
            "genre"=> $genre_info,
            "author"=> $author_info,
        ];
    }

    protected function getAuthorData(){
        $author_id = $this->author_id;
        $author = Author::find($author_id);
        $author_name = $author->name;

        return [
            'id' => $author_id,
            'name'=> $author_name,
        ];
    }

    protected function getGenreData(){
        $genre_id = $this->genre_id;
        $genre = Genre::find($genre_id);
        $genre_name = $genre->name;

        return [
            'id' => $genre_id,
            'name'=> $genre_name,
        ];
    }
}
