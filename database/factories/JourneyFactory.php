<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JourneyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tanggal' => $this->faker->date(),
            'waktu' => $this->faker->time(),
            'lokasi' => $this->faker->streetAddress(),
            'suhu_tubuh' => $this->faker->numberBetween(30, 40)
        ];
    }
}
