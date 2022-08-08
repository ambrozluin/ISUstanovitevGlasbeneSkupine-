<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Glasbenaskupina>
 */
class GlasbenaskupinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'imeskupine' => $this->faker->sentence(),
            'zanr' => $this->faker->sentence(),
            'lokacija' => $this->faker->city(),
            'tags' => 'rock, pop, blues',
            'opis' => $this->faker->paragraph(5),
        ];
    }
}
