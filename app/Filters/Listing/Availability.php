<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class Availability implements FilterContract
{
    public function __construct(
        protected $query
    ) {}

    public function handle($value): void
    {
        $this->query->where('availability',$value); 
    }
}