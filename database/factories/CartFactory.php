<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $experiences = Experience::pluck('id');
        return [
            'quantity' => $this->faker->randomNumber(),
            'experience_id' => $this->faker->unique()->randomElement($experiences),
        ];
    }
}
