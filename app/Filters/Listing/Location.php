<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class Location implements FilterContract
{
    public function __construct(
        protected $query
    ) {}

    public function handle($value): void
    {
        $this->query->whereIn('location_id',$value); 
    }
}