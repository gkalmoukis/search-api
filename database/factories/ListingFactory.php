<?php

namespace Database\Factories;

use App\Enums\ListingAvailabilityEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(10, 10000000),
            'square_meters' => $this->faker->numberBetween(20, 10000),
            'availability' => $this->faker->randomElement(ListingAvailabilityEnum::cases()),
        ];
    }
}
