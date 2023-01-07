<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class SquareMetersMin implements FilterContract
{
    public function __construct(
        protected $query
    ) {}

    public function handle($value): void
    {
        $this->query->where('square_meters', '>=' , (int) $value);
    }
}