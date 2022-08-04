<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GlasbenaSkupina>
 */
class GlasbenaSkupinaFactory extends Factory
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
            'oznake' => 'laravel, api, backend',
            'lokacija' => $this->faker->city(),
            'opis' => $this->faker->paragraph(5),
        ];
    }
}
