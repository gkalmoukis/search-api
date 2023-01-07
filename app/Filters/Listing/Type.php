<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class Type implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->whereHas('types', function($type) use ($value){
            $type->where('type_id', $value);
        }); 
    }
}