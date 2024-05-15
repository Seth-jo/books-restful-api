<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AuthorFilter extends ApiFilter{
    protected $allowed_params = [
        'id' => ['eq','in'],
        'name' => ['eq','in','lk'],
        'genreId' => ['eq','in']
    ];

    protected $column_map = [
        'id'=> 'id',
        'name'=> 'name',
        'genreId'=> 'genre_id',
    ];

    protected $operator_map = [
        'eq' => '=',
        'in'=> 'IN',
        'lk'=> 'LIKE'
    ];

}