<?php

namespace App\Repositories;

use App\Models\Search;
use Illuminate\Support\Facades\DB;

class SearchRepository
{
    public function __construct(
        protected Search $model
    ) {}

    public function createNewSearch($attributes)
    {
        try {
            DB::beginTransaction();
            
            $newSearch = $this->model->create([
                "price_min" => $attributes['priceMin'],
                "price_max" => $attributes['priceMax'],
                "square_meters_min" => $attributes['squareMetersMin'],
                "square_meters_max" => $attributes['squareMetersMax'],
                "availability" => $attributes['availability']
            ]);

            if(! empty($attributes['location'])){
                $newSearch->locations()->attach($attributes['location']);    
            }

            if(! empty($attributes['type'])){
                $newSearch->types()->attach($attributes['type']);    
            }
            
            DB::commit();        
            return $newSearch;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
        


        
}
