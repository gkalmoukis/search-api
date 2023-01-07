<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListingCollection;
use App\Http\Resources\ListingResource;
use App\Repositories\ListingRepository;
use App\Http\Requests\SearchListingRequest;
use App\Repositories\SearchRepository;

class ListingController extends APIController
{
    public function __construct(
        protected ListingRepository $listings,
        protected SearchRepository $searches
    ) {}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchListingRequest $request)
    {
        try {
            $filters = $request->validated();
            $listings = $this->listings->getAllListingsPaginated($filters);
 
            $this->searches->createNewSearch($filters);

            return $this->success(
                new ListingCollection($listings)
            );
        } catch (\Exception $e) {
            return $this->fail($e->getMessage());
        }        
    }

    // add doc
    public function show($id)
    {
        try {
            return $this->success(
                new ListingResource($this->listings->getListingsById($id))
            );
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->fail($e->getMessage());
        } catch (\Exception $e) {
            return $this->fail($e->getMessage());
        }
    }
    
}
