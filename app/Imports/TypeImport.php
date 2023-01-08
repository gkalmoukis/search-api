<?php

namespace App\Imports;

use App\Models\Type;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{
    Importable, 
    WithHeadingRow, 
    ToCollection, 
    WithProgressBar
};

class TypeImport implements ToCollection, WithHeadingRow, WithProgressBar
{
    use Importable;

    public function headingRow(): int
    {
        return 1;
    }

    public function collection(Collection $rows)
    {
        $types = [];
      
        foreach ($rows as $row) {
            $types = array_merge($types, explode(',', str_replace(" ", "", $row['type']) ));
        }
       

        foreach (collect($types)->unique() as $type) {
            Type::create([
                "name" => $type
            ]);
        }
    }
}
