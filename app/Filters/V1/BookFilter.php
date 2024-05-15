<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class BookFilter extends ApiFilter{
    protected $allowed_params = [
        'id' => ['eq'],
        'title' => ['eq'],
        'genreId' => ['eq'],
        'authorId'=> ['eq']
    ];

    protected $column_map = [
        'id'=> 'id',
        'title'=> 'title',
        'genreId'=> 'genre_id',
        'authorId'=> 'author_id',
    ];

    protected $operator_map = [
        'eq' => '='
    ];

}