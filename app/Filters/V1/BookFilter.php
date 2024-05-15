<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class BookFilter extends ApiFilter{
    protected $allowed_params = [
        'id' => ['eq'],
        'title' => ['eq','lk'],
        'isbn'=> ['eq','lk'],
        'genreId' => ['eq'],
        'authorId'=> ['eq']
    ];

    protected $column_map = [
        'id'=> 'id',
        'title'=> 'title',
        'isbn'=> 'isbn',
        'genreId'=> 'genre_id',
        'authorId'=> 'author_id',
    ];

    protected $operator_map = [
        'eq' => '=',
        'in'=> 'IN',
        'lk'=> 'LIKE'
    ];

}