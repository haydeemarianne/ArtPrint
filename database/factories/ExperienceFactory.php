<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'category' => $this->faker->randomElement(['ceramica', 'escritura', 'acuarela', 'cocina', 'fotografia', 'cosmetica']),
            'location_id' => Location::all()->random()->id,
            'price' => $this->faker->randomNumber(),
            'image' => $this->faker->imageUrl(360, 360),
            'format' => $this->faker->randomElement(['presencial', 'online', 'hibrido']),
            'description' => $this->faker->text(),
            'company' => $this->faker->company(),
        ];
    }
}
