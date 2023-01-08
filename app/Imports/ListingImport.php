<?php

namespace App\Imports;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{
    Importable, 
    WithHeadingRow, 
    ToCollection, 
    WithProgressBar
};
use App\Models\{
    Listing,
    Type,
    Location
};

class ListingImport implements  ToCollection, WithHeadingRow, WithProgressBar
{
    use Importable;

    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row) {
            $location = Location::where('name', $row['location'])->first();
            
            $typeNames = explode(',', str_replace(" ", "", $row['type']) );
            $types = [];
            foreach ($typeNames as $type) {
                $types []= Type::where('name', $type)->first();
            }

            $listing = Listing::create([
                'location_id' => $location->id,
                'price' => $row['price'],
                'square_meters' => $row['square_meters'],
                'availability' => $row['availability'],
            ]);
            
            $listing->types()->attach(collect($types)->pluck("id"));
        }
    }
}
