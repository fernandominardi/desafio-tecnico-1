<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country(),
            'code_2_letter' => $this->faker->countryCode(),
            'code_3_letter' => $this->faker->countryISOAlpha3(),
            'phone_code' => $this->faker->numerify('+###'),
        ];
    }
}
