<?php

namespace App\Imports;

use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{
    Importable, 
    WithHeadingRow, 
    ToCollection, 
    WithProgressBar
};

class LocationImport implements ToCollection, WithHeadingRow, WithProgressBar
{
    use Importable;

    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $rows)
    {
        $locations = [];
      
        foreach ($rows as $row) {
            $locations []= $row['location'];
        }
        
        foreach (collect($locations)->unique() as $location) {
            Location::create([
                "name" => $location
            ]);
        }
    }
}
