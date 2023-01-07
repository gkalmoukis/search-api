<?php

namespace App\Http\Controllers;

use App\Repositories\ListingRepository;
use Illuminate\Http\Request;

class ListingController extends APIController
{
    public function __construct(
        protected ListingRepository $listings
    ) {}

    
}
