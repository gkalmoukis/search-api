<?php

namespace App\Repositories;

use App\Models\Listing;

class ListingRepository
{
    public function __construct(
        protected Listing $model
    ) {}

    public function getAllListingsPaginated()
    {
        return $this->model
            ->with('location')
            ->with('types')
            ->paginate();
    }

    public function getListingsById($id)
    {
        return $this->model
            ->with('location')
            ->with('types')
            ->findOrFail($id);
    }
}