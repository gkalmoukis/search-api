<?php

namespace App\Repositories;

use App\Models\{
    Location,
};
use App\Enums\ListingAvailabilityEnum;

class ContentRepository
{
    public function __construct(
        protected Location $locations
    ) {}

    public function getAllLocations()
    {
        return $this->locations->all();
    }

    public function getAllAvailabilities()
    {
        return ListingAvailabilityEnum::cases();
    }
}