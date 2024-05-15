<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Genre;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $genre_info = $this->getGenreData();

        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "genre"=> $genre_info,
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
