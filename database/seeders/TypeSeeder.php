<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect(["apartment", "studio", "loft", "maisonette"]);

        foreach ($types as $type) {
            \App\Models\Type::factory()->create([
                "name" => $type
            ]);
        }
    }
}
