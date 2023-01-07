<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollection;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;

class ContentController extends APIController
{
    public function __construct(
        protected ContentRepository $contents
    ) {}

    public function getLocations()
    {
        return $this->success(
            new LocationCollection($this->contents->getAllLocations())
        );
    }
}
