<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports>
 */
class ReportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document_number' => fake()->numerify("REP-########"),
            'user_id' => fake()->numberBetween(2, 51),
            'outlet_id' => fake()->numberBetween(1, 120),
            'report_title' => fake()->sentence(),
            'report_desc' => fake()->realText($maxNbChars = 150, $indexSize = 2),
        ];
    }
}
