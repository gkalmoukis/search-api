<?php

namespace App\Repositories;

use App\Models\Listing;

class ListingRepository
{
    public function __construct(
        protected Listing $model
    ) {}

    public function getAllListings()
    {
        return $this->model
            ->with('location')
            ->with('types')
            ->get();
    }

    public function getListingsById($id)
    {
        return $this->model
            ->with('location')
            ->with('types')
            ->findOrFail($id);
    }
}