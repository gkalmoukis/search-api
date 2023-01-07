<?php

namespace App\Filters\Listing;

use App\Contracts\FilterContract;

class SquareMetersMin implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->where('square_meters', '>=' , (int) $value);
    }
}