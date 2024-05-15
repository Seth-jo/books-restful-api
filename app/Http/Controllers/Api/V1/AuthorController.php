<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\AuthorResource;
use App\Http\Resources\V1\AuthorCollection;
use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreAuthorRequest;
use App\Http\Requests\V1\UpdateAuthorRequest;
use Illuminate\Http\Request;
use App\Filters\V1\AuthorFilter;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new AuthorFilter();
        $queryItems = $filter->transform($request); // [['column','operator','value']]

        if (count($queryItems) == 0) {
            return new AuthorCollection(Author::paginate());
        }
        else{
            $authors = Author::where($queryItems)->paginate();
            return new AuthorCollection($authors -> appends($request -> query()));
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
    public function store(StoreAuthorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
    }
}
