<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class PriceMin implements FilterContract
{
    public function __construct(
        protected $query
    ) {}

    public function handle($value): void
    {
        $this->query->where('price', '>=' , (int) $value); 
    }
}