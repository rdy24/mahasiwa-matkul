<?php

namespace Database\Factories;

use App\Models\Krs;
use Illuminate\Database\Eloquent\Factories\Factory;

class KrsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
     protected $model = Krs::class;
    public function definition()
    {
        return [
            'mahasiswa_id' => $this->faker->numberBetween(1, 20),
            'mata_kuliah_id' => $this->faker->numberBetween(1, 30),
        ];
    }
}
