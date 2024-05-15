<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class GenreFilter extends ApiFilter{
    protected $allowed_params = [
        'id' => ['eq'],
        'name' => ['eq']
    ];

    protected $column_map = [
        'id'=> 'id',
        'name'=> 'name'
    ];

    protected $operator_map = [
        'eq' => '=',
        'in'=> 'IN',
        'lk'=> 'LIKE'
    ];

}