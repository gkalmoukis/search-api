<?php

namespace App\Repositories;

use App\Models\{
    Location,
    Type
};
use App\Enums\ListingAvailabilityEnum;

class ContentRepository
{
    public function __construct(
        protected Location $locations,
        protected Type $types
    ) {}

    public function getAllLocations()
    {
        return $this->locations->all();
    }

    public function getAllTypes()
    {
        return $this->types->all();
    }

    public function getAllAvailabilities()
    {
        return ListingAvailabilityEnum::cases();
    }
}