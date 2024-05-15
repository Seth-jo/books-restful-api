<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\BookResource;
use App\Http\Resources\V1\BookCollection;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreBookRequest;
use App\Http\Requests\V1\UpdateBookRequest;
use Illuminate\Http\Request;
use App\Filters\V1\BookFilter;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new BookFilter();
        $queryItems = $filter->transform($request); // [['column','operator','value']]

        if (count($queryItems) == 0) {
            return new BookCollection(Book::paginate());
        }
        else{
            $books = Book::where($queryItems)->paginate();
            return new BookCollection($books->appends($request->query()));
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
    public function store(StoreBookRequest $request)
    {
        //
        return new BookResource(Book::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book ->delete();
    }
}
