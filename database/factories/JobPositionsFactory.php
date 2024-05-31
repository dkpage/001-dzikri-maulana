<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPositions>
 */
class JobPositionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'position_name' => fake()->jobTitle(),
            'initial' => fake()->regexify('[A-Z]{5}[0-4]{3}')
        ];
    }
}
