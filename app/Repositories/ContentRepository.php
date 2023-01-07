<?php

namespace App\Repositories;

use App\Models\{
    Location,
};

class ContentRepository
{
    public function __construct(
        protected Location $locations
    ) {}

    public function getAllLocations()
    {
        return $this->locations->all();
    }
}