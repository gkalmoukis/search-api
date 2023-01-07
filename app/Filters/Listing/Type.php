<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class Type implements FilterContract
{
    public function __construct(
        protected $query
    ) {}

    public function handle($value): void
    {
        $this->query->whereHas('types', function($type) use ($value){
            $type->where('type_id', $value);
        }); 
    }
}