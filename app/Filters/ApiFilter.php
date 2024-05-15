<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter{
    protected $allowed_params = [];

    protected $column_map = [];

    protected $operator_map = [];

    public function transform(Request $request){
        $eloQuery = [];

        foreach ($this->allowed_params as $param => $operators) {
            $query = $request->query($param);
            if(!isset($query)){
                continue;
            }
            $column = $this->column_map[$param] ?? $param;
            foreach ($operators as $operator) {
                if(isset($query[$operator])){
                    if($operator == 'lk'){
                        $value = '%'.$query[$operator].'%';
                    }
                    else{
                        $value = $query[$operator];
                    }
                    $eloQuery[] = [$column, $this->operator_map[$operator],$value];
                }
            }
        }

        return $eloQuery;
    }

}