<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class Location implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->whereIn('location_id',$value); 
    }
}