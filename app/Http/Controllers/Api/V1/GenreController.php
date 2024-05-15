<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\GenreCollection;
use App\Http\Resources\V1\GenreResource;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreGenreRequest;
use App\Http\Requests\V1\UpdateGenreRequest;
use Illuminate\Http\Request;
use App\Filters\V1\GenreFilter;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new GenreFilter();
        $queryItems = $filter->transform($request); // [['column','operator','value']]

        if (count($queryItems) == 0) {
            return new GenreCollection(Genre::paginate());
        }
        else{
            $genres = Genre::where($queryItems)->paginate();
            return new GenreCollection($genres->appends($request->query()));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre -> delete();
    }
}
