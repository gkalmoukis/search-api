<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Location::factory()
            ->count(10)
            ->has(\App\Models\Listing::factory()->count(10))
            ->create();

        $listings = \App\Models\Listing::all();
        

        
        foreach ($listings as $listing) {
            $types = \App\Models\Type::inRandomOrder()->limit(2)->get();
            $listing->types()->attach($types);
        }
    }
}
