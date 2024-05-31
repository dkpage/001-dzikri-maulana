<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outlets>
 */
class OutletsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'outlet_name' => fake()->city(),
            'initial' => Str::upper(fake()->lexify('OT-????')),
            'address' => fake()->address()
        ];
    }
}
